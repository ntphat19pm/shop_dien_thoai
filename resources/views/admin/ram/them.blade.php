@extends('layouts.app')
@section('content')
 <div class="card">
 <div class="card-header">Thêm ram</div>
 <div class="card-body">
 <form action="{{ route('admin.ram.them') }}" method="post">
 @csrf
 
 <div class="mb-3">
 <label class="form-label" for="tenloai">Tên ram</label>
 <input type="text" class="form-control @error('tenram') is-invalid @enderror" id="tenram" name="tenram" value="{{ old('tenram') }}" required />
 @error('tenram')
 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
 @enderror
</div>
 
 <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Thêm vào CSDL</button>
 </form>
 </div>
 </div>
@endsection