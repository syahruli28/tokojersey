<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use LigaSeeder;
use Livewire\Component;

class Navbar extends Component
{

    public $jumlah = 0; // jumlah isi keranjang, defaultnya 0

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang' // untuk realtime notif keranjang
    ];

    public function updateKeranjang() // untuk realtime notif keranjang
    {
        $this->mount();
    }

    public function mount()
    {
        if (Auth::user()) { // jika ada user yang masuk, maka jalankan fungsi dibawah
            // ambil detail keranjang yang statusnya 0 berdasarkan user yang login
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) { // jika ada
                // update variabel jumlah dengan banyaknya isi keranjang dari si user yang login
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'ligas' => Liga::all(),
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
