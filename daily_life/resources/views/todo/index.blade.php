@extends('layouts.layout')

@section('title','toDoリスト')

@section('main')
<div class="main">
  <h2 class="title">toDoリスト</h2>
  <div class="flex between">
    <p>現在のtoDo:{{ $todos->count() }}件</p>
    <p><a href="/todo/create" class="create-btn"><i class="fas fa-plus"></i>toDoを作成</a></p>
  </div>
  <div class="todo-container">
    <table>
      <thead>
        <tr>
          <th></th>
          <th>toDo</th>
          <th>期限</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($todos as $todo)
      <tr>
        <td>
          <p class="status">未了</p>
          <input type="checkbox" id="check" name="check">
        </td>
        <td>
          {{ $todo->todo }}
        </td>

        @if ($todo->year === '')
          <td></td>
        @else
          <td>{{ $todo->year.'/'.$todo->month.'/'.$todo->date.$todo->day.' '.$todo->time }}</td>
        @endif
        
        <td>
          <div class="flex">
            <form action="/todo/{{ $todo->id }}/edit" method="GET">
              @csrf
              <button type="submit" class="icon-btn edit-btn"><i class="far fa-edit"></i>編集</button>
            </form>
            <form action="/todo/{{ $todo->id }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="icon-btn delete-btn"><i class="far fa-trash-alt"></i>削除</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    <input type="checkbox" name="all_check" id="all_check">
    <label for="all_check" class="all_check_label">全て完了にする</label>
  </div>
</div>
@endsection