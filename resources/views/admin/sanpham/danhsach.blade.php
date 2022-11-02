@extends('layouts.app')
@section('content')
 <div class="card">
 <div class="card-header">Sản phẩm</div>
 <div class="card-body table-responsive">
 <p><a href="{{ route('admin.sanpham.them') }}" class="btn btn-info"><i class="bi bi-plus"></i> Thêm mới</a></p>
 <a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-cloud-upload"></i> Nhập từ Excel</a>
 <a href="{{ route('admin.sanpham.xuat') }}" class="btn btn-success"><i class="bi bi-cloud-download"></i> Xuất ra Excel</a>
 <table class="table table-bordered table-hover table-sm mb-0">
 <thead>
 <tr>
 <th width="5%">#</th>
 <th width="10%">Hình ảnh</th>
 <th width="20%">Loại sản phẩm</th>
 <th width="20%">Loại Ram</th>
 <th width="40%">Tên sản phẩm</th>
 <th width="5%">SL</th>
 <th width="10%">Đơn giá</th>
 <th width="5%">Sửa</th>
 <th width="5%">Xóa</th>
 </tr>
 </thead>
 <tbody>
 @foreach($sanpham as $value)
 <tr>
 <td>{{ $loop->iteration }}</td>
 <td class="text-center"><img src="{{url('storage/app')}}/{{ $value->LoaiSanPham->tenloai_slug }}/{{ $value->hinhanh }}" width="80" /></td>
 <td>{{ $value->LoaiSanPham->tenloai }}</td>
 <td>{{ $value->Ram->tenram }}</td>
 <td>{{ $value->tensanpham }}</td>
 <td class="text-end">{{ $value->soluong }}</td>
 <td class="text-end">{{ number_format($value->dongia) }}</td>
 <td class="text-center"><a href="{{ route('admin.sanpham.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
 <td class="text-center"><a href="{{ route('admin.sanpham.xoa', ['id' => $value->id]) }}"><i class="bi bi-trash text-danger"></i></a></td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
 <form action="{{ route('admin.sanpham.nhap') }}" method="post" enctype="multipart/form-data">
 @csrf
 <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>
 <div class="modal-body">
 <div class="mb-0">
 <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
 <input type="file" class="form-control" id="file_excel" name="file_excel" required />
 </div>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i> Hủy bỏ</button>
 <button type="submit" class="btn btn-danger"><i class="bi bi-cloud-upload"></i> Nhập dữ liệu</button>
 </div>
 </div>
 </div>
 </div>
 </form>
@endsection