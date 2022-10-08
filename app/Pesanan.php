<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{

    protected $fillable = [
        'kode_pemesanan', 'status', 'total_harga', 'kode_unik', 'user_id',
    ];

    public function pesanan_details()
    {
        // one to Many (1 pesanan punya banyak detail)
        return $this->hasMany(Pesanan::class, 'pesanan_id', 'id');
    }

    public function user()
    {
        // Many to one (banyak produk dimiliki 1 liga)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
