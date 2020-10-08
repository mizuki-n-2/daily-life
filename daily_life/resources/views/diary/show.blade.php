@extends('layouts.layout')

@section('title','日記')

@section('main')
<div class="main">
  <h2 class="title">日記</h2>
  <a href="/diary" class="to-post-btn">＜日記一覧へ</a>
  <div class="flex top between">
    <p class="show-date">{{ $post->month.'月'.$post->date.'日'.$post->day }}</p>
    <div class="flex">
      <form action="/diary/{{ $post->id }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="icon-btn delete-btn"><i class="far fa-trash-alt fa-2x"></i></button>
      </form>
      <form action="/diary/{{ $post->id }}/edit" method="GET">
        @csrf
        <button type="submit" class="icon-btn edit-btn"><i class="far fa-edit fa-2x"></i></button>
      </form>
    </div>
  </div>
  <div>
    <p class="show-title">{{ $post->title }}</p>
    <p class="show-content">{{ $post->content }}</p>
    <p class="show-tag">{{ $post->tag }}</p>
    @if ($post->image !== '')
      <img src="{{ asset('/image/004.JPG') }}" width="100%">
    @endif
  </div>
</div>
@endsection