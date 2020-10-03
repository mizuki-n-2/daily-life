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
      <div class="form-group">
        <label for="exampleFormControlInput1">toDo</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="todo" value="{{ $item->todo }}">
        <label for="exampleFormControlSelect1">状態</label>
        <select class="form-control" id="exampleFormControlSelect1" name="status">
          <option value="">選択してください</option>
          <option>未着手</option>
          <option>進行中</option>
          <option>完了</option>
        </select>
        <label for="exampleFormControlInput1">期限</label>
        <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="time_limit" value="{{ $item->time_limit }}">
      </div>
      <div class="btn-container">
        <a href="/todo" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">編集</button>
      </div>
    </form>
  </div>
</div>
@endsection