<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $table = 'loaisanpham';
 // protected $primaryKey = 'id';
 // public $incrementing = false;
 // protected $keyType = 'string';
 
    public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'loaisanpham_id', 'id');
    }
}
