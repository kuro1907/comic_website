@extends('layouts.index-layout')
@section('title','Truyện')
@section('cover')
<div class="col-md-12 top-50">
    <div class="row justify-content-md-center">
        <h3>Tên truyện</h3>
    </div>
    <div class="row justify-content-md-center">
        <a class="col-md-2 btn btn-dark" href="">Chap trước</a>
        <div class="col-md-5 ">
            <select class="form-control" onchange="window.location=this.value;">
                <option value="/doc-vo-luyen-dinh-phong-chuong-1109.html" selected>1</option>
                <option value="/doc-vo-luyen-dinh-phong-chuong-1109.html">2</option>
            </select>
        </div>
        <a class="col-md-2 btn btn-dark" href="">Chap sau</a>

    </div>

</div>

@endsection

@section('content')
<div class="content bottom-50 ">
    <div class="row justify-content-md-center">
        <img src="/storage/img/1200x628-100-2.jpg" alt="">
        <img src="/storage/img/1200x628-100-2.jpg" alt="">
        <img src="/storage/img/1200x628-100-2.jpg" alt="">
        <img src="/storage/img/1200x628-100-2.jpg" alt="">
        <img src="/storage/img/1200x628-100-2.jpg" alt="">
    </div>
</div>

@endsection