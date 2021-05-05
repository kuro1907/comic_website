@extends('layouts.dashboard-layout')
@section('title')
<title>Sửa chap {{$chapter->name}}</title>
@endsection

@section('title-section')
Sửa chap {{$chapter->name}}
@endsection
@section('content')

<div class="col-md-12">
    <form action="/admin/comics/details/{{$id}}/editchapter/{{$chapter->id}}" method="post">
        @csrf
        <div class=" form-group row">
            <label class="col-md-2">Tên chap :</label>
            <input type="text" name="name" value="{{$chapter->name}}" class="col-md-6 form-control">
        </div>
        <div class=" form-group row">
            <label class="col-md-2">Số chap</label>
            <input type="text" name="number" value="{{$chapter->number}}" class="col-md-6 form-control">
        </div>
        <div class=" form-group row ">
            <label class="col-md-2">Nội dung :</label>
            <textarea name="content" id="summernote" cols="30" rows="10" class="form-control col-md-12">
            {{$chapter->content}}
            </textarea>
        </div>

        <script>
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        </script>
        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Hủy</a>
        </div>

    </form>
</div>
@endsection