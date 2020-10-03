<?php

namespace App\Http\Controllers;

use App\Diary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $posts = DB::table('diaries')->where('user_id',$id)->orderBy('updated_at','desc')->paginate(3);
        return view('diary.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diary.create');
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
            'user_id' => $id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => 'url',
            'created_at' => $now,
            'updated_at' => $now 
        ];
        DB::table('diaries')->insert($param);
        return redirect('/diary');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        $post = DB::table('diaries')->where('id',$diary->id)->first();
        return view('diary.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        $post = DB::table('diaries')->where('id',$diary->id)->first();
        return view('diary.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        $id = Auth::id();
        $now = Carbon::now();
        $param = [
            'user_id' => $id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => 'url',
            'updated_at' => $now
        ];
        DB::table('diaries')->where('id',$diary->id)->update($param);
        return redirect('/diary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        DB::table('diaries')->where('id',$diary->id)->delete();
        return redirect('/diary');
    }
}
