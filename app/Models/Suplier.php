<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Suplier extends Model
{
    use HasFactory;

    protected $table = 'suplier';

    protected $guarded = [];

    public function barang(){
        return $this->belongsToMany(Barang::class);
    }
}
