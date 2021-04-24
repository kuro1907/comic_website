@extends('layouts.dashboard-layout')
@section('title','QUẢN LÝ TÁC GIẢ')
@section('content')
<a class="btn btn-success" type="button" href="/admin/authors/create">Thêm tác giả</a>
<table class="table table-striped table-hover">
    <thead class=" table-bordered">
        <tr class="table-primary">
            <th>STT</th>
            <th>Tên tác giả</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $key => $author)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$author->name}}</td>
            <td><a type="button" class="btn btn-primary" href="/admin/authors/details/{{$author->id}}">Chi tiết</a>
                <a type="button" class="btn btn-outline-warning" href="/admin/authors/edit/{{$author->id}}">Sửa</a>
                <a type="button" class="btn btn-outline-danger" href="/admin/authors/delete/{{$author->id}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="pagination">
            {{ $authors->appends(request()->query()) }}
        </div>

    </div>
</div>
@endsection