@extends('layouts.dashboard-layout')
@section('title','QUẢN LÝ THỂ LOẠI')
@section('content')
<a class="btn btn-success" type="button" href="/admin/categories/create">Thêm thể loại</a>

<table class="table table-striped table-hover">
    <thead class=" table-bordered">
        <tr class="table-primary">
            <th>STT</th>
            <th>Tên thể loại</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $category)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$category->name}}</td>
            <td><a type="button" class="btn btn-primary" href="/admin/categories/details/{{$category->id}}">Chi tiết</a>
                <a type="button" class="btn btn-outline-warning" href="/admin/categories/edit/{{$category->id}}">Sửa</a>
                <a type="button" class="btn btn-outline-danger" href="/admin/categories/delete/{{$category->id}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="pagination">
            {{ $categories->appends(request()->query()) }}
        </div>

    </div>
</div>

@endsection