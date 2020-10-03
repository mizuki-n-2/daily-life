@extends('layouts.layout')

@section('title','日記')

@section('main')
<div class="main">
  <h2 class="title">日記</h2>
  <div>
    <form class="form" action="/diary/{{ $post->id }}" method="POST">
      @method('PUT')
      @csrf
      <h3 class="item-name">編集</h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">タイトル</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">内容</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content">{{ $post->content }}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">画像</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <div class="btn-container">
        <a href="/diary" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">編集</button>
      </div>
    </form>
  </div>
</div>
@endsection