@extends('layouts.layout')

@section('title','toDoリスト')

@section('main')
<div class="main">
  <h2 class="title">toDoリスト</h2>
  <div class="flex list-container">
    <div class="todo-container">
      <p class="list-name">to Do</p>
      <i class="fas fa-plus fa-2x todo-plus-icon"></i>
    </div>
    <div class="done-container">
      <p class="list-name">Done</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      toDo
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      toDo
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      toDo
    </div>
  </div>
</div>
@endsection
