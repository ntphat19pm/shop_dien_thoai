@extends('layouts.app')
@section('content')
 <div class="card">
 <div class="card-header">Ram</div>
 <div class="card-body table-responsive">
 <p><a href="{{ route('admin.ram.them') }}" class="btn btn-info"><i class="bi bi-plus"></i> Thêm mới</a></p>
 <table class="table table-bordered table-hover table-sm mb-0">
 <thead>
 <tr>
 <th width="5%">#</th>
 <th width="45%">Tên Ram</th>
 <th width="5%">Sửa</th>
 <th width="5%">Xóa</th>
 </tr>
 </thead>
 <tbody>
 @foreach($ram as $value)
 <tr>
 <td>{{ $loop->iteration }}</td>
 <td>{{ $value->tenram }}</td>
 <td class="text-center"><a href="{{ route('admin.ram.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
 <td class="text-center"><a href="{{ route('admin.ram.xoa', ['id' => $value->id]) }}"><i class="bi bi-trash text-danger"></i></a></td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
@endsection