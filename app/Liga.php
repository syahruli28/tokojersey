<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    public function products()
    {
        // one to Many (1 liga punya banyak produk)
        return $this->hasMany(Product::class, 'liga_id', 'id');
    }
}
