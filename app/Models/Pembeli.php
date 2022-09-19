<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;

class Pembeli extends Model
{
    use HasFactory;
    
    protected $table = 'pembeli';

    protected $guarded = [];

    public function penjualan(){
        return $this->hasMany(Penjualan::class);
    }
}
