@extends('layouts.layout')

@section('title','メモ')

@section('main')
<div class="main">
  <h2 class="title">メモ</h2>
  <div class="flex memo-top">
    <div>
      <a href="/memo/create"><i class="fas fa-plus fa-2x" style="color: black;"></i></a>
    </div>
    <div>
      <form action="{{ url('/memo/search')}}" method="POST">
        @csrf
        <div class="flex">
          <i class="fas fa-search fa-2x"></i>
          <input type="text" name="keyword" placeholder="search">
          <button type="submit">検索</button>
        </div>
      </form>
    </div>
  </div>
  <a href="/memo">メモ一覧へ</a>
  @foreach ($search_memos as $memo)
    <div class="card">
      <div class="card-body flex">
        <div>
          <h5 class="card-title">{{ $memo->memo_name }}</h5>
          <p class="card-text">{{ $memo->memo }}</p>
        </div>
        <div class="flex">
          <form action="/memo/{{ $memo->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="icon-btn"><i class="far fa-trash-alt fa-2x"></i></button>
          </form>
          <form action="/memo/{{ $memo->id }}/edit" method="GET">
            @csrf
            <button type="submit" class="icon-btn"><i class="far fa-edit fa-2x"></i></button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  {{ $search_memos->links() }}
</div>
@endsection