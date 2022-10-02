<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function liga()
    {
        // Many to one (banyak produk dimiliki 1 liga)
        return $this->belongsTo(Liga::class, 'liga_id', 'id');
    }

    public function pesanan_details()
    {
        // one to Many (1 produk punya banyak detail)
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }
}
