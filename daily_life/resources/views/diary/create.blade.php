@extends('layouts.layout')

@section('title','日記')

@section('main')
<div class="main">
  <h2 class="title">日記</h2>
  <div>
    <form class="form" action="/diary" method="POST" enctype='multipart/form-data'>
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
        <label for="date">日付</label>
        <input type="date" id="date" name="time" class="block">
      </div>
      <div class="form-group">
        <input type="text" class="diary-title" name="title" placeholder="タイトル">
      </div>
      <div class="form-group">
        <textarea class="diary-content" name="content" placeholder="自由に記述してください" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label for="image">＋画像を追加</label> 
        <input type="file" id="image" name="image" class="block">
      </div>
      <div class="btn-container">
        <a href="/diary" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">作成</button>
      </div>
    </form>
  </div>
</div>
@endsection