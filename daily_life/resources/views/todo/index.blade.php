@extends('layouts.layout')

@section('title','toDoリスト')

@section('main')
<div class="main">
  <h2 class="title">toDoリスト</h2>
  <div class="flex list-container">
    <div class="todo-container">
      <a class="list-name" href="">to Do</a>
      <a href="/todo/create"><i class="fas fa-plus fa-2x todo-plus-icon"></i></a>
    </div>
    <div class="done-container">
      <a class="list-name" href="">Done</a>
    </div>
  </div>
  @foreach ($todos as $todo)
    <div class="card">
      <div class="card-body flex">
        <div>
          <input type="checkbox" id="check">
          <label for="check"><h5 class="card-title">{{ $todo->todo }}</h5></label>
        </div>
        <div class="flex">
          <form action="/todo/{{ $todo->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="icon-btn"><i class="far fa-trash-alt fa-2x"></i></button>
          </form>
          <form action="/todo/{{ $todo->id }}/edit" method="GET">
            @csrf
            <button type="submit" class="icon-btn"><i class="far fa-edit fa-2x"></i></button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  {{ $todos->links() }}
</div>
@endsection