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
        $todos = DB::table('todos')->where('user_id',$id)->orderBy('updated_at', 'desc')->paginate(3);
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
        $id = Auth::id();
        $status = $_POST["status"];
        $now = Carbon::now();
        $param = [
            'todo' => $request->todo,
            'user_id' => $id,
            'time_limit' => $request->time_limit,
            'status' => $status,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('todos')->insert($param);
        return redirect('/todo');  
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
        // dd($item);
        return view('todo.edit',['item' => $item]);
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
        $id = Auth::id();
        $status = $_POST["status"];
        $now = Carbon::now();
        $param = [
            'todo' => $request->todo,
            'user_id' => $id,
            'time_limit' => $request->time_limit,
            'status' => $status,
            'updated_at' => $now
        ];
        DB::table('todos')->where('id', $todo->id)->update($param);
        return redirect('/todo');  
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
        return redirect('/todo');
    }
}
