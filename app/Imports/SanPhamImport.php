<?php

namespace App\Imports;
use Illuminate\Support\Str;
use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SanPhamImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SanPham([
            //
            'loaisanpham_id' => $row['ma_loai'],
            'ram_id' => $row['ma_ram'],
            'tensanpham' => $row['ten_san_pham'],
            'tensanpham_slug' => Str::slug($row['ten_san_pham']),
            'soluong' => $row['so_luong'],
            'dongia' => $row['don_gia'],
            'hinhanh' => $row['hinh_anh'],
        ]);
    }
}
