<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $nama, $jumlah_pesanan, $nomor;

    // fungsi yang pertama kali dijalankan
    public function mount($id)
    {
        $productId = Product::find($id);
        if ($productId) {
            $this->product = $productId;
        }
    }

    // bersihkan form input
    public function ClearForm()
    {
        $this->nama = '';
        $this->jumlah_pesanan = '';
        $this->nomor = '';
    }

    public function masukkanKeranjang()
    {
        // validasi formnya
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        // cek apakah saat klik masukan keranjang user sudah login atau belum
        if (!Auth::user()) { // jika belum redirect ke login
            return redirect()->route('login');
        } // jika sudah login

        // menghitung total harga
        if (!empty($this->nama)) { // cek apakah form nama ada isinya / diisi
            // jika ada
            $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_nameset;
        } else {
            // jika kosong
            $total_harga = $this->jumlah_pesanan * $this->product->harga;
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // Cek apakah user yang login menyimpan pesanan di keranjang (belum checkout/statusnya 0)
        if (empty($pesanan)) { // jika kosong/tidak ada
            // maka input data baru ke tb pesanan
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            // setelah data sebelumnya sudah masuk tb pesanan, masukkan lagi data kode_pemesanan ke tb sebelumnya
            // karna sebelumnya belum ada pesanan idnya
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'JP-' . $pesanan->id;
            $pesanan->update();
        } else { // jika ada
            // maka hanya update di tb pesanan
            $pesanan->total_harga = $pesanan->total_harga + $total_harga;
            $pesanan->update();
        }

        // lalu masukan data ke tb pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'namaset' => $this->nama ? true : false,
            'nama' => $this->nama,
            'nomor' => $this->nomor,
            'total_harga' => $total_harga,
        ]);

        // flash message
        session()->flash('message', 'Sukses masuk ke keranjang');
        // hapus input form
        $this->ClearForm();
        // redirect
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
