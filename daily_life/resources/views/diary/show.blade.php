@extends('layouts.layout')

@section('title','日記')

@section('main')
<div class="main">
  <h2 class="title">日記</h2>
  <div class="flex memo-top">
    <div>
      <p>{{ $post->updated_at }}</p>
    </div>
    <div class="flex">
      <form action="/diary/{{ $post->id }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="icon-btn"><i class="far fa-trash-alt fa-2x"></i></button>
      </form>
      <form action="/diary/{{ $post->id }}/edit" method="GET">
        @csrf
        <button type="submit" class="icon-btn"><i class="far fa-edit fa-2x"></i></button>
      </form>
    </div>
  </div>
  <div>
    <p>{{ $post->title }}</p>
    <p>{{ $post->content }}</p>
  </div>
</div>
@endsection