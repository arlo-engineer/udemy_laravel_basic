<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        dd('test');

        // Eloquent(エロクアント)
        $values = Test::all();

        $count = Test::count(); // 件数の取得

        $first = Test::findOrFail(1); // idを指定することで一つのインスタンスを取得

        $whereBBB = Test::where('text', '=', 'bbb')->get(); // 検索して取得（text項目がbbbのデータを取得）

        // クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get();

        dd($values, $count, $first, $whereBBB, $queryBuilder);

        return view('tests.test', compact('values'));
    }
}

