<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'products' => Product::take(4)->get(), //hanya ambil 4
            'ligas' => Liga::all() // ambil semua
        ]);
    }
}
