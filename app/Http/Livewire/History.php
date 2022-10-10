<?php

namespace App\Http\Livewire;

use App\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{

    public $pesanans;

    public function render()
    {

        if (Auth::user()) { // jika sudah login
            // ambil data pesanan yang sudah checkout(status 1)
            $this->pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }


        return view('livewire.history');
    }
}
