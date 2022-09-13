<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';

    protected $guarded = [];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
