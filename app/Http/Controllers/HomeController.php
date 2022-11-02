<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DatHangEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function getDatHangDemo()
    // {
    // // Thêm Đơn hàng demo
    // $donhang = DonHang::create([
    // 'user_id' => Auth::user()->id,
    // 'dienthoaigiaohang' => '0939011900',
    // 'diachigiaohang' => '18 Ung Văn Khiêm - TP. Long Xuyên - An Giang',
    // ]);
    
    // // Thêm Đơn hàng chi tiết demo
    // DonHang_ChiTiet::create([
    // 'donhang_id' => $donhang->id,
    // 'sanpham_id' => 2,
    // 'soluongban' => 1,
    // 'dongiaban' => 5990000,
    // ]);
    
    // DonHang_ChiTiet::create([
    // 'donhang_id' => $donhang->id,
    // 'sanpham_id' => 142,
    // 'soluongban' => 1,
    // 'dongiaban' => 350000,
    // ]);
    
    // // Gởi email
    // Mail::to(Auth::user()->email)->send(new DatHangEmail($donhang));
    
    // return redirect()->route('frontend.dathangthanhcong');
    // }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome()
    {
        return view('frontend.index');
    }
}
