@extends('layouts.layout')

@section('title','toDoリスト')

@section('main')
<div class="main">
  <h2 class="title">toDoリスト</h2>
  <div class="form-container">
    <form class="form" action="/todo" method="POST">
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
        <label for="exampleFormControlInput1">toDo</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="todo">
        <label for="exampleFormControlInput1">期限</label>
        <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="time_limit">
      </div>
      <div class="btn-container">
        <a href="/todo" class="back-btn">もどる</a>
        <button type="submit" class="btn btn-primary btn-lg">作成</button>
      </div>
    </form>
  </div>
</div>
@endsection