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

        // 表示するデータを選択
        $selectData = self::modelingSelectData($request);

        if (!empty($request->year)) {
            // 年を選択されている場合
            $monthQuery->where('year', '=', $request->year);
        } else {
            // 年を詮索されていない場合
            // 最新のレコードのtime_idを取得
            // 最新のbooksレコードの年を表示
            $monthQuery->where('year', '=', $selectData['year']);
        }
        $months = $monthQuery->get();

        return view('home', compact('years', 'months', 'selectData'));
    }

    private function modelingSelectData(Request $request): array
    {
        $selectData = [];

        // 選択された年月のデータを取得
        if ($request->time) {
            $selectTime = \DB::table('times')->where('id', '=', $request->time)->first();
        } elseif ($request->year) {
            $selectTime = \DB::table('times')->where('year', '=', $request->year)->orderBy('month', 'DESC')->first();
        } else {
            $latestRecord = \DB::table('books')->orderBy('id', 'DESC')->first();
            $selectTime = \DB::table('times')->where('id', '=', $latestRecord->time_id)->first();
        }
        // dd($selectTime);
        $selectData['year'] = $selectTime->year;
        $selectData['month'] = $selectTime->month;

        // 収入に関するデータを取得
        // 収入合計
        $selectData['incomeSum'] = \DB::table('books')->where('time_id', '=', $selectTime->id)->where('balance', '=', 0)->sum('amount');
        $selectData['outgoSum'] = \DB::table('books')->where('time_id', '=', $selectTime->id)->where('balance', '=', 1)->sum('amount');

        $selectData['income'] = \DB::table('books')->join('categories', 'books.category_id', '=', 'categories.id')->selectRaw("category_id as id, categories.name as name, SUM(books.amount) as sumAmount, categories.balance as balance")->where('time_id', '=', $selectTime->id)->groupBy('category_id')->get();
        // dd($selectData['income']);
        // var_dump($selectData);
        return $selectData;
    }
}
