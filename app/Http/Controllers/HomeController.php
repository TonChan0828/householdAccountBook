<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // 記録されている年月を取得
        $years = \DB::table('times')->select('year')->distinct()->get();
        $monthQuery = \DB::table('times');
        // dd($selectData);

        if (!empty($request->year)) {
            // 年を選択されている場合
            $monthQuery->where('year', '=', $request->year);
        } else {
            // 年を詮索されていない場合
            // 最新のレコードのtime_idを取得
            $selectNewTime = \DB::table('books')->select('time_id')->orderBy('updated_at', 'DESC')->first();
            $selectYear = \DB::table('times')->select('year')->where('id', '=', $selectNewTime->time_id)->first();
            // 最新のbooksレコードの年を表示
            $monthQuery->where('year', '=', $selectYear->year);
        }
        $months = $monthQuery->get();

        // 選択された年月のデータを取得
        $selectTime = \DB::table('times')->where('id', '=', $request->time)->get();
        $selectData = \DB::table('books')->where('time_id', '=', $request->time)->get();

        return view('home', compact('years', 'months', 'selectTime', 'selectData'));
    }
}
