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
        $posts = DB::table('diaries')->where('user_id',$id)->orderBy('updated_at','desc')->paginate(5);
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
        $validatedData = $request->validate([
            'time' => 'required',
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'nullable|file|image',
            'tag' => 'nullable'
        ]); 

        $id = Auth::id();
        $day = date("w", strtotime($request->time));
        $week = [
            "日", "月", "火", "水", "木", "金", "土"
        ];
        $year = date("Y", strtotime($request->time));
        $month = date("n", strtotime($request->time));
        $date = date("j", strtotime($request->time));
        $dayOfWeek = date("($week[$day])", strtotime($request->time));

        if($request->file('image') === null) {
            $image = '';
        } else {
            $path = $request->file('image')->store('public/image');
            $image = basename($path); 
        }

        $now = Carbon::now();
        $param = [
            'user_id' => $id,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'day' => $dayOfWeek,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
            'tag' => $request->tag,
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('diaries')->insert($param);
        
        return redirect('/diary')->with('flash_message', '日記を作成しました');
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
        $strlenM = strlen($post->month);
        if ($strlenM === 1) {
            $month = '0' . $post->month;
        } else {
            $month = $post->month;
        }
        $strlenD = strlen($post->date);
        if ($strlenD === 1) {
            $date = '0' . $post->date;
        } else {
            $date = $post->date;
        }
        return view('diary.edit',['post' => $post, 'month' => $month, 'date' => $date]);
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
        $validatedData = $request->validate([
            'time' => 'required',
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'nullable|file|image',
            'tag' => 'nullable'
        ]); 

        $id = Auth::id();
        $day = date("w", strtotime($request->time));
        $week = [
            "日", "月", "火", "水", "木", "金", "土"
        ];
        $year = date("Y", strtotime($request->time));
        $month = date("n", strtotime($request->time));
        $date = date("j", strtotime($request->time));
        $dayOfWeek = date("($week[$day])", strtotime($request->time));

        if ($request->file('image') === null) {
            $image = '';
        } else {
            $path = $request->file('image')->store('public/image');
            $image = basename($path);
        }

        $now = Carbon::now();
        $param = [
            'user_id' => $id,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'day' => $dayOfWeek,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
            'tag' => $request->tag,
            'updated_at' => $now
        ];
        DB::table('diaries')->where('id',$diary->id)->update($param);
        return redirect('/diary')->with('flash_message', '日記を編集しました');
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
        return redirect('/diary')->with('flash_message', '日記を削除しました');
    }
}
