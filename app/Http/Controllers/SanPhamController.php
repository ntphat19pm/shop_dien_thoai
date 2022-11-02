<?php
namespace App\Http\Controllers;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use File;
use Excel;
class SanPhamController extends Controller
{
   // Nhập từ Excel
 public function postNhap(Request $request)
 {
 Excel::import(new SanPhamImport, $request->file('file_excel'));
 return redirect()->route('admin.sanpham');
 }
 
 // Xuất ra Excel
 public function getXuat()
 {
 return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
 }
 public function __construct()
 {
 $this->middleware('auth');
 }
 
 public function getDanhSach()
 {
 $sanpham = SanPham::all();
 return view('admin.sanpham.danhsach', compact('sanpham'));
 }
 
 public function getThem()
 {
 $loaisanpham = LoaiSanPham::all();
 $ram = Ram::all();
 return view('admin.sanpham.them', compact('loaisanpham','ram'));
 }
 
 public function postThem(Request $request)
 {
    // Kiểm tra tập tin rỗng hay không?
 if($request->hasFile('hinhanh'))
 {
 // Tạo thư mục nếu chưa có
 $lsp = LoaiSanPham::find($request->loaisanpham_id);
 File::isDirectory($lsp->tenloai_slug) or Storage::makeDirectory($lsp->tenloai_slug, 0775);
 
 // Xác định tên tập tin
 $extension = $request->file('hinhanh')->extension();
 $newfilename = Str::slug($request->tensanpham, '-') . '.' . $extension;
 
 // Upload vào thư mục và trả về đường dẫn
 $path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $newfilename);
 }
 $request->validate([
 'loaisanpham_id' => ['required'],
 'ram_id' => ['required'],
 'tensanpham' => ['required', 'max:255', 'unique:sanpham'],
 'soluong' => ['required', 'numeric'],
 'dongia' => ['required', 'numeric'],
 // 'hinhanh' => ['image', 'max:2048'],
 ]);
 
 $orm = new SanPham();
 $orm->loaisanpham_id = $request->loaisanpham_id;
 $orm->ram_id = $request->ram_id;
 $orm->tensanpham = $request->tensanpham;
 $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
 $orm->soluong = $request->soluong;
 $orm->dongia = $request->dongia;
 if($request->hasFile('hinhanh')) $orm->hinhanh = $newfilename;
 $orm->motasanpham = $request->motasanpham;
 $orm->save();
 
 return redirect()->route('admin.sanpham');
 }
 
 public function getSua($id)
 {
 $sanpham = SanPham::find($id);
 $loaisanpham = LoaiSanPham::all();
 $ram = Ram::all();
 return view('admin.sanpham.sua', compact('sanpham', 'loaisanpham','ram'));
 }
 
 public function postSua(Request $request, $id)
 {
 $request->validate([
 'loaisanpham_id' => ['required'],
 'ram_id' => ['required'],
 'tensanpham' => ['required', 'max:255', 'unique:sanpham,tensanpham,' . $id],
 'soluong' => ['required', 'numeric'],
 'dongia' => ['required', 'numeric'],
 // 'hinhanh' => ['image', 'max:2048'],
 ]);
 
 $orm = SanPham::find($id);
 $orm->loaisanpham_id = $request->loaisanpham_id;
 $orm->ram_id = $request->ram_id;
 $orm->tensanpham = $request->tensanpham;
 $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
 $orm->soluong = $request->soluong;
 $orm->dongia = $request->dongia;
 if($request->hasFile('hinhanh')) $orm->hinhanh = $request->hinhanh;
 $orm->motasanpham = $request->motasanpham;
 $orm->save();
 
 return redirect()->route('admin.sanpham');
 }
 
 public function getXoa($id)
 {
 $orm = SanPham::find($id);
 $orm->delete();
 
 return redirect()->route('admin.sanpham');
 } }