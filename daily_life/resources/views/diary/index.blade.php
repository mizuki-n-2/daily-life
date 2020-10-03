@extends('layouts.layout')

@section('title','日記')

@section('main')
<div class="main">
  <h2 class="title">日記</h2>
  <div class="flex memo-top">
    <div>
      <a href="/diary/create"><i class="fas fa-plus fa-2x" style="color: black;"></i></a>
    </div>
    <div>
      <form action="" method="POST">
        @csrf
        <div class="flex">
          <i class="fas fa-search fa-2x"></i>
          <input type="text" name="keyword" placeholder="search">
          <button type="submit">検索</button>
        </div>
      </form>
    </div>
  </div>
  @foreach ($posts as $post)
  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-4">
        <svg class="bd-placeholder-img" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image</text></svg>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->content }}</p>
          <p class="card-text"><small class="text-muted">{{ $post->updated_at }}</small></p>
          <a href="/diary/{{ $post->id }}">詳細へ</a>
        </div>
      </div>
    </div>
  </div>  
  @endforeach
</div>
@endsection