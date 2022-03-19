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
        $years = \DB::table('books')->select('year')->groupBy('year')->get();
        $months = \DB::table('books')->select('month')->where('year', '=', 2020)->groupBy('month')->get();

        // 選択(初回は最新の編集した)データを取得
        $selectData = \DB::table('books')->orderBy('updated_at', 'DESC')->limit(1)->get();
        // dd($selectData);
        return view('home', compact('years', 'months', 'selectData'));
    }
}
