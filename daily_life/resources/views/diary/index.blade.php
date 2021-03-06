@extends('layouts.layout')

@section('title','日記')

@section('main')
<div class="main">
  <h2 class="title">日記</h2>
  <div class="flex top between">
    <div>
      <a href="/diary/create"><i class="fas fa-plus fa-2x create-btn"></i></a>
    </div>
    <div>
      <form action="{{ url('/diary/search')}}" method="POST">
        @csrf
        <div class="flex">
          <i class="fas fa-search fa-2x"></i>
          <input type="text" name="tagWord" placeholder="日記を検索">
          <button type="submit">検索</button>
        </div>
      </form>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif
  @foreach ($posts as $post)
  <div class="card div-link">
    <div class="card-body flex between">
      <div>
        <h1 class="card-title post-date">{{ $post->month.'月'.$post->date.'日'.$post->day }}</h1>
        <h5 class="card-title post-title">{{ $post->title }}</h5>
        <p class="post-tag">{{ $post->tag }}</p>
        <a href="/diary/{{ $post->id }}" class="link"></a>
      </div>
      <div>
        @if ($post->image !== '')
          <img src="{{ asset('/image/004.JPG') }}" height="100px">
        @endif
      </div>
    </div>
  </div> 
  @endforeach
  {{ $posts->links() }}
</div>
@endsection