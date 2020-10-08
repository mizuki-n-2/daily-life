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
        <input type="date" class="block" id="date" name="time" value="{{ $post->year.'-'.$month.'-'.$date }}">
      </div>
      <div class="form-group">
        <input type="text" class="diary-title" name="title" value="{{ $post->title }}" placeholder="タイトル">
      </div>
      <div class="form-group">
        <textarea class="diary-content" name="content" placeholder="自由に記述してください" rows="10">{{ $post->content }}</textarea>
      </div>
      <div class="form-group">
        <label for="tag">検索用タグ</label> 
        <input type="text" class="block" id="tag" name="tag" placeholder="例：#tag" value="{{ $post->tag }}">
      </div>
      <div class="form-group">
        <p>
          <label for="image">＋画像を変更または追加</label> <input type="file" class="block" id="image" name="">
        </p>
      </div>
      <div class="btn-container">
        <a href="/diary" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">編集</button>
      </div>
    </form>
  </div>
</div>
@endsection