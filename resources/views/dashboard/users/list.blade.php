@extends('layouts.dashboard-layout')
@section('title','QUẢN LÝ NGƯỜI DÙNG')
@section('content')
<a class="btn btn-success" type="button" href="/admin/users/create">Thêm thể loại</a>

<table class="table table-striped table-hover">
    <thead class=" table-bordered">
        <tr class="table-primary">
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td><a type="button" class="btn btn-primary" href="/admin/users/details/{{$user->id}}">Chi tiết</a>
                <a type="button" class="btn btn-outline-warning" href="/admin/users/edit/{{$user->id}}">Sửa</a>
                <a type="button" class="btn btn-outline-danger" href="/admin/users/delete/{{$user->id}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="pagination">
            {{ $users->appends(request()->query()) }}
        </div>

    </div>
</div>

@endsection