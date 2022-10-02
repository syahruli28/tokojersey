<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function pesanan()
    {
        // Many to one (banyak detail dimiliki 1 pesanan)
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function product()
    {
        // Many to one (banyak produk dimiliki 1 pesanan)
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
