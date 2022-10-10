<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{

    public $total_harga, $nohp, $alamat;

    public function mount()
    {
        if (!Auth::user()) { // jika belum login redirect ke halaman login
            return redirect()->route('login');
        }

        // masukan data ke variabel dari data user yang login
        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;

        // ambil data pesanan yang statusnya masih 0 sesuai user yang login
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($pesanan)) { // jika ada data pesanan yang statusnya masih 0 
            $this->total_harga = $pesanan->total_harga + $pesanan->kode_unik; // update variabel total harga sesuai dari total harga user yang login
        } else { // jika tidak ada data statusnya 0
            return redirect()->route('home'); // redirect ke home
        }
    }


    public function checkout()
    {
        // validasi form
        $this->validate([
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        // Simpan nohp dan alamat ke user sesuai dengan user yang login
        $user = User::where('id', Auth::user()->id)->first();
        $user->nohp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();


        // Update data status pada pesanan jadi 1
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        // update notif keranjang (dioper ke controller navbar)
        $this->emit('masukKeranjang');

        // tampilkan flash
        session()->flash('message', 'Checkout berhasil.');
        // redirect ke history
        return redirect()->route('history');
    }


    public function render()
    {
        return view('livewire.checkout');
    }
}
