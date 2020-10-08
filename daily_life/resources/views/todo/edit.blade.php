@extends('layouts.layout')

@section('title','toDoリスト')

@section('main')
<div class="main">
  <h2 class="title">toDoリスト</h2>
  <div class="form-container">
    <form class="form" action="/todo/{{ $item->id }}" method="POST">
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
        <label for="exampleFormControlInput1">toDo</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="todo" value="{{ $item->todo }}">
        <label for="exampleFormControlInput1">期限</label>
        <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="time_limit" value="{{ $data['year'].'-'.$data['month'].'-'.$data['date'].'T'.$data['time'] }}">
      </div>
      <div class="btn-container">
        <a href="/todo" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">編集</button>
      </div>
    </form>
  </div>
</div>
@endsection