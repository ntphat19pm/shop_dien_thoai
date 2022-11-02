<?php
namespace App\Exports;
use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
class SanPhamExport implements FromCollection,
 WithHeadings,
 WithCustomStartCell,
 WithMapping
{
 public function headings(): array
 {
 return [
 'Mã loại',
 'Mã ram',
 'Tên sản phẩm',
 'Tên sản phẩm không dấu',
 'Số lượng',
 'Đơn giá',
 'Hình ảnh',
 ];
 }
 
 public function map($row): array
 {
 return [
 $row->loaisanpham_id,
 $row->ram_id,
 $row->tensanpham,
 $row->tensanpham_slug,
 $row->soluong,
 $row->dongia,
 $row->hinhanh,
 ];
 }
 
 public function startCell(): string
 {
 return 'A1';
 }
 
 public function collection()
 {
 return SanPham::all();
 } }