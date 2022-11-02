<?php
namespace App\Http\Controllers;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class DonHangController extends Controller
{
 public function __construct()
 {
 $this->middleware('auth');
 }
 
 public function getDanhSach()
 {
 $donhang = DonHang::orderBy('created_at', 'desc')->get();
 return view('admin.donhang.danhsach', compact('donhang'));
 }
 
 public function getSua($id)
 {
 $donhang = DonHang::find($id);
 return view('admin.donhang.sua', compact('donhang'));
 }
 
 public function postSua(Request $request, $id)
 {
 $request->validate([
 'dienthoai' => ['required', 'max:20'],
 'diachi' => ['required', 'max:255'],
 'tinhtrang' => ['required'],
 ]);
 
 $orm = DonHang::find($id);
 $orm->dienthoaigiaohang = $request->dienthoai;
 $orm->diachigiaohang = $request->diachi;
 $orm->tinhtrang = $request->tinhtrang;
 $orm->save();
 
 return redirect()->route('admin.donhang');
 }
 
 public function getXoa($id)
 {
 $orm = DonHang::find($id);
 $orm->delete();
 
 $chitiet = DonHang_ChiTiet::where('donhang_id', $orm->id)->first();
 $chitiet->delete();
 return redirect()->route('admin.donhang');
 } }