<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{

    protected $pesanan;
    protected $pesanan_details = [];


    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::find($id); // cari data pesanan berdasarkan id
        if (!empty($pesanan_detail)) { // jika ada
            $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first(); // cari data pesanan sesuai dengan pesanan id
            $jumlah_pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->count(); // hitung jumlah pesanan detail yang ada
            if ($jumlah_pesanan_detail == 1) { // jika hanya ada 1 data di pesanan detail
                $pesanan->delete(); // hapus juga data pesanannya
            } else { // jika data pesanan detail ada lebih dari 1
                $pesanan->total_harga = $pesanan->total_harga - $pesanan_detail->total_harga; // maka update data total harga baru di data pesanan
                $pesanan->update(); // update data pesanan
            }

            $pesanan_detail->delete(); // hapus data pesanan detail sesuai idnya
        }

        $this->emit('masukKeranjang'); // update realtime notif keranjang

        // session berhasil hapus data
        session()->flash('message', 'Data belanja berhasil dihapus.');
    }


    public function render()
    {
        if (Auth::user()) { // cek apakah ada session user
            // ambil data pesanan sesuai dengan id user yang login
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            // jika ada data pesanan
            if ($this->pesanan) {
                // ambil data pesanan detail dari id user yang login
                $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
            }
        }

        return view('livewire.keranjang', [
            // kirim data pesanan dan pesanan detail
            'pesanan' => $this->pesanan,
            'pesanan_details' => $this->pesanan_details,
        ]);
    }
}
