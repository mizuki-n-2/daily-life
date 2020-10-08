<?php

namespace App\Http\Controllers;

use App\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $todos = DB::table('todos')->where('user_id',$id)->orderBy('updated_at', 'desc')->get();
        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'todo' => 'required',
            'time_limit' => 'nullable',
        ]); 

        $id = Auth::id();
        $day = date("w", strtotime($request->time_limit));
        $week = [
            "日","月","火","水","木","金","土"
        ];
        $year = date("Y", strtotime($request->time_limit));
        $month = date("m", strtotime($request->time_limit));
        $date = date("d", strtotime($request->time_limit));
        $dayOfWeek = date("($week[$day])", strtotime($request->time_limit));
        $time = date("G:i", strtotime($request->time_limit));
        $now = Carbon::now();

        if ($request->time_limit === null) {
            $time = '';
            $year = '';
            $month = '';
            $date = '';
            $dayOfWeek = '';
            $time = '';
        }

        $param = [
            'todo' => $request->todo,
            'user_id' => $id,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'day' => $dayOfWeek,
            'time' => $time,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('todos')->insert($param);
        return redirect('/todo')->with('flash_message', 'toDoを作成しました');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        $item = DB::table('todos')->where('id',$todo->id)->first();
        $strlen = strlen($item->time);
        if( $strlen === 4 ) {
            $time = '0'.$item->time;
        } else {
            $time = $item->time;
        }
        $data = [
            'year' => $item->year,
            'month' => $item->month,
            'date' => $item->date,
            'time' => $time
        ];
        return view('todo.edit',['item' => $item, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'todo' => 'required',
            'time_limit' => 'nullable',
        ]); 

        $id = Auth::id();
        $day = date("w", strtotime($request->time_limit));
        $week = [
            "日", "月", "火", "水", "木", "金", "土"
        ];
        $year = date("Y", strtotime($request->time_limit));
        $month = date("m", strtotime($request->time_limit));
        $date = date("d", strtotime($request->time_limit));
        $dayOfWeek = date("($week[$day])", strtotime($request->time_limit));
        $time = date("G:i", strtotime($request->time_limit));
        $now = Carbon::now();

        if ($request->time_limit === null) {
            $time = '';
            $year = '';
            $month = '';
            $date = '';
            $dayOfWeek = '';
            $time = '';
        }

        $param = [
            'todo' => $request->todo,
            'user_id' => $id,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'day' => $dayOfWeek,
            'time' => $time,
            'updated_at' => $now
        ];

        DB::table('todos')->where('id', $todo->id)->update($param);
        return redirect('/todo')->with('flash_message', 'toDoを編集しました');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        DB::table('todos')->where('id',$todo->id)->delete();
        return redirect('/todo')->with('flash_message', 'toDoを削除しました');
    }
}
