<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {
        $keyword = $request->keyword;
        $search_memos = DB::table('memos')->where('memo_name',$keyword)->orderBy('updated_at', 'desc')->paginate(3);
        return view('memo.search', ['search_memos' => $search_memos]); 
    }
}
