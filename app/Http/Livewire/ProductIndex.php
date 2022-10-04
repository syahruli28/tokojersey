<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;
    protected $updatedQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage(); // agar dapat memaksimalkan hasil search walaupun datanya terlewat (halaman)
    }

    public function render()
    {

        // cek apakah ada data yang dikirim dari search form
        if ($this->search) {
            $products = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        } else {
            // ambil data produk dengan paginasi
            $products = Product::paginate(8);
        }

        return view('livewire.product-index', [
            'products' => $products
        ]);
    }
}
