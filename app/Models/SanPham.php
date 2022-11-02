<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = [
        'loaisanpham_id',
        'ram_id',
        'tensanpham',
        'tensanpham_slug',
        'soluong',
        'dongia',
        'hinhanh',
        'motasanpham',
        ];
 
 public function LoaiSanPham()
 {
    return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
    }
    public function Ram()
 {
    return $this->belongsTo(Ram::class, 'ram_id', 'id');
    }
    
    public function DonHang_ChiTiet()
    {
        return $this->hasMany(DonHang_ChiTiet::class, 'sanpham_id', 'id');
    }
}
