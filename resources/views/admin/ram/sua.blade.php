@extends('layouts.app')
@section('content')
 <div class="card">
 <div class="card-header">Sửa loại ram</div>
 <div class="card-body">
 <form action="{{ route('admin.ram.sua', ['id' => $ram->id]) }}" method="post">
 @csrf
 <div class="mb-3">
 <label class="form-label" for="tenram">Tên loại Mới</label>
 <input type="text" class="form-control  @error('tenram') is-invalid @enderror" id="tenram" name="tenram"  value="{{ $ram->tenram }}" required />
 @error('tenloai')
 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
 @enderror
</div>
 
 <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Cập nhật</button>
 </form>
 </div>
 </div>
@endsection