<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {
        $validatedData = $request->validate([
            'keyword' => 'filled',
        ]);  
        $id = Auth::id();     
        $keyword = $request->keyword;
        $filter_memos = DB::table('memos')->where('user_id', $id);
        $search_memos = $filter_memos->where('memo_name','like','%'. $keyword.'%')->orWhere('memo', 'like', '%' . $keyword . '%')->orderBy('updated_at', 'desc')->paginate(5);
        return view('memo.search', ['search_memos' => $search_memos, 'keyword' => $keyword]); 
    }
}
