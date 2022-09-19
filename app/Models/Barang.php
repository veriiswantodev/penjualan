<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suplier;
use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Penjualan;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $guarded = [];

    public function suplier(){
        return $this->belongsTo(Suplier::class);
    }

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function pembelian(){
        return $this->hasMany(Pembelian::class);
    }

    public function penualan(){
        return $this->hasMany(Penjualan::class);
    }
}
