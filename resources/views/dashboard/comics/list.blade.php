@extends('layouts.dashboard-layout')
@extends('layouts.dashboard-layout')
@section('title')
<title>Quản lý truyện tranh</title>
@endsection
@section('title-section','Quản lý truyện tranh')
@section('content')
<a class="btn btn-success" type="button" href="/admin/comics/create">Thêm truyện</a>

<table class="table table-striped table-hover">
    <thead class=" table-bordered">
        <tr class="table-primary">
            <th>STT</th>
            <th>Tên truyện</th>
            <th>Slide chính</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comics as $key => $comic)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$comic->name}}</td>
            <td>
                @if($comic->slide == 1)
                <p>Có</p>
                @else
                <p>Không</p>
                @endif
            </td>
            <td><a type="button" class="btn btn-primary" href="/admin/comics/details/{{$comic->id}}">Chi tiết</a>
                <a type="button" class="btn btn-outline-warning" href="/admin/comics/edit/{{$comic->id}}">Sửa</a>
                <a type="button" class="btn btn-outline-danger" href="/admin/comics/delete/{{$comic->id}}" onClick="return confirm('Xoá truyện {{$comic->name}}?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="pagination">
            {{ $comics->appends(request()->query()) }}
        </div>

    </div>
</div>
@endsection