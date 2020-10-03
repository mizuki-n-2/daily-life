<?php

namespace App\Http\Controllers;

use App\Memo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $memos = DB::table('memos')->where('user_id',$id)->orderBy('updated_at', 'desc')->paginate(3);
        return view('memo.index', ['memos' => $memos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memo.create');
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
        $now = Carbon::now();
        $param = [
            'memo_name' => $request->title,
            'memo' => $request->content,
            'user_id' => $id,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('memos')->insert($param);
        return redirect('/memo');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        $item = DB::table('memos')->where('id', $memo->id)->first();
        return view('memo.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memo $memo)
    {
        $id = Auth::id();
        $now = Carbon::now();
        $param = [
            'memo_name' => $request->title,
            'memo' => $request->content,
            'user_id' => $id,
            'updated_at' => $now
        ];
        DB::table('memos')->where('id', $memo->id)->update($param);
        return redirect('/memo');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        DB::table('memos')->where('id', $memo->id)->delete();
        return redirect('/memo');
    }
}
