@extends('layouts.layout')

@section('title','メモ')

@section('main')
<div class="main">
  <h2 class="title">メモ</h2>
  <div class="form-container">
    <form class="form" action="/memo" method="POST">
      @csrf
      <h3 class="item-name">新規作成</h3>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="form-group">
        <label for="exampleFormControlInput1">タイトル</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">内容</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content"></textarea>
      </div>
      <div class="btn-container">
        <a href="/memo" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">作成</button>
      </div>
    </form>
  </div>
</div>
@endsection