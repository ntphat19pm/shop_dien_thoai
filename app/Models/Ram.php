<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;
    protected $table = 'ram';
    public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'ram_id', 'id');
    }
}