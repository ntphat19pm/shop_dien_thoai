@extends('layouts.app')
@section('content')
 <div class="card">
 <div class="card-header">Chỉnh sửa đơn hàng</div>
 <div class="card-body">
 <form action="{{ route('donhang.sua', ['id' => $donhang->id]) }}" method="post">
 @csrf
 
 <div class="mb-3">
 <label class="form-label" for="user_id">Khách hàng</label>
 <input type="text" class="form-control" id="user" name="user_id" value="{{ $donhang->NguoiDung->name }}" disabled required />
 </div>
 
 <div class="mb-3">
 <label class="form-label" for="dienthoai">Điện thoại giao hàng</label>
 <input type="text" class="form-control @error('dienthoai') is-invalid @enderror" id="dienthoai" name="dienthoai" value="{{ $donhang->dienthoaigiaohang }}" required />
 @error('dienthoai')
 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
 @enderror
 </div>
 
 <div class="mb-3">
 <label class="form-label" for="diachi">Địa chỉ giao hàng</label>
 <input type="text" class="form-control @error('diachi') is-invalid @enderror" id="diachi" name="diachi" value="{{ $donhang->diachigiaohang }}" required />
 @error('diachi')
 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
 @enderror
 </div>
 
 <div class="mb-3">
 <label class="form-label" for="tinhtrang">Tình trạng đơn hàng</label>
 <select class="form-select @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" required>
 <option value="">-- Chọn --</option>
 <option value="0" {{ ($donhang->tinhtrang == 0) ? 'selected' : '' }}>Mới</option>
 <option value="1" {{ ($donhang->tinhtrang == 1) ? 'selected' : '' }}>Đang xác nhận</option>
 <option value="2" {{ ($donhang->tinhtrang == 2) ? 'selected' : '' }}>Đã hủy</option>
 <option value="3" {{ ($donhang->tinhtrang == 3) ? 'selected' : '' }}>Đang đóng gói</option>
 <option value="4" {{ ($donhang->tinhtrang == 4) ? 'selected' : '' }}>Đang đi nhận</option>
 <option value="5" {{ ($donhang->tinhtrang == 5) ? 'selected' : '' }}>Đang chuyển</option>
 <option value="6" {{ ($donhang->tinhtrang == 6) ? 'selected' : '' }}>Thất bại</option>
 <option value="7" {{ ($donhang->tinhtrang == 7) ? 'selected' : '' }}>Đang chuyển hoàn</option>
 <option value="8" {{ ($donhang->tinhtrang == 8) ? 'selected' : '' }}>Đã chuyển hoàn</option>
 <option value="9" {{ ($donhang->tinhtrang == 9) ? 'selected' : '' }}>Thành công</option>
 </select>
 @error('tinhtrang')
 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
 @enderror
 </div>
 
 <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Cập nhật</button>
 </form>
 </div>
 </div>
@endsection