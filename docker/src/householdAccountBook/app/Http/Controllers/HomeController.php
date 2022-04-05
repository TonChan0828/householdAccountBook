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
        list($selectData, $months) = self::createData($request);

        return view('home', compact('months', 'selectData'));
    }

    private function createData(Request $request): array
    {
        $selectData = self::modelingSelectData($request);
        $months = self::createMonths($request, $selectData);

        return array($selectData, $months);
    }

    private function modelingSelectData(Request $request): array
    {
        $selectData = [];

        // 選択された年月のデータを取得
        if ($request->time_id) {
            $selectTime = \DB::table('times')->where('id', '=', $request->time_id)->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->first();
        } elseif ($request->year) {
            $selectTime = \DB::table('times')->where('year', '=', $request->year)->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->orderBy('month', 'DESC')->first();
        } else {
            $latestRecord = \DB::table('books')->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->orderBy('id', 'DESC')->first();
            $selectTime = \DB::table('times')->where('id', '=', $latestRecord->time_id)->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->first();
        }
        // dd($selectTime);
        $selectData['time'] = $selectTime;

        // 収入に関するデータを取得
        // 収入合計
        $selectData['incomeSum'] = \DB::table('books')->where('time_id', '=', $selectTime->id)->where('balance', '=', 0)->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->sum('amount');
        $selectData['outgoSum'] = \DB::table('books')->where('time_id', '=', $selectTime->id)->where('balance', '=', 1)->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->sum('amount');

        $selectData['income'] = \DB::table('books')->join('categories', 'books.category_id', '=', 'categories.id')->selectRaw("category_id as id, categories.name as name, SUM(books.amount) as sumAmount, categories.balance as balance")->where('time_id', '=', $selectTime->id)->where('books.user_id', '=', \Auth::id())->whereNull('books.deleted_at')->groupBy('category_id')->get();
        // dd($selectData['income']);
        // var_dump($selectData);
        return $selectData;
    }

    private function createMonths(Request $request, array $selectData)
    {
        // 記録されている年月を取得
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
            $monthQuery->where('year', '=', $selectData['time']->year);
        }
        $months = $monthQuery->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->get();

        return $months;
    }

    public function selectData(Request $request)
    {
        list($selectData, $months) = self::createData($request);
        $categories = \DB::table('categories')->where('user_id', '=', \Auth::id())->get();
        // dd($categories);
        return view('selectData', compact('months', 'selectData', 'categories'));
    }

    public function editData(Request $request)
    {
        // dd($request->all());
        $validatedInput = $request->validate(['timeId' => 'required|integer', 'balance' => 'required|boolean', 'category' => 'required|string', 'price' => 'required|integer', 'edit' => 'required']);
        // dd($validatedInput);
        \DB::transaction(function () use ($validatedInput) {
            $isExistCategory = \DB::table('categories')
                ->where('name', '=', $validatedInput['category'])->where('user_id', '=', \Auth::id())->whereNull('deleted_at')->exists();

            if ($validatedInput['edit'] === 'add') {
                if (!$isExistCategory) {
                    \DB::table('categories')
                        ->insertGetId(['name' => $validatedInput['category'], 'balance' => $validatedInput['balance'], 'user_id' => \Auth::id()]);
                }
                if ($validatedInput['price'] !== '0') {
                    $categoryData = \DB::table('categories')
                        ->where('name', '=', $validatedInput['category'])
                        ->where('user_id', '=', \Auth::id())
                        ->whereNull('deleted_at')->first();
                    \DB::table('books')
                        ->insertGetId(['amount' => $validatedInput['price'], 'balance' => $validatedInput['balance'], 'time_id' => $validatedInput['timeId'], 'category_id' => $categoryData->id, 'user_id' => \Auth::id()]);
                }
            } elseif ($validatedInput['edit'] === 'delete') {
                if ($isExistCategory) {
                }
            }
        });

        return redirect('/home');
    }

    public function selectSheet(Request $request)
    {
        list($selectData, $months) = self::createData($request);

        return view('selectSheet', compact('months', 'selectData'));
    }

    public function editSheet(Request $request)
    {
        $validatedTime = $request->validate(['year' => 'required|integer', 'month' => 'required|integer', 'edit' => 'required']);

        \DB::transaction(function () use ($validatedTime) {
            $isExist = \DB::table('times')
                ->where('year', '=', $validatedTime['year'])
                ->where('month', '=', $validatedTime['month'])
                ->where('user_id', '=', \Auth::id())
                ->whereNull('deleted_at')->exists();

            if ($validatedTime['edit'] === 'add') {
                if (!$isExist && $validatedTime['month'] >= 1 && $validatedTime['month'] <= 12) {
                    \DB::table('times')
                        ->insertGetId(['year' => $validatedTime['year'], 'month' => $validatedTime['month'], 'user_id' => \Auth::id()]);
                }
            } elseif ($validatedTime['edit'] === 'delete') {
                if ($isExist) {
                    \DB::table('times')
                        ->where('year', '=', $validatedTime['year'])
                        ->where('month', '=', $validatedTime['month'])
                        ->whereNull('deleted_at')
                        ->update(['deleted_at' => date("Y-m-d H:i:s", time())]);
                }
            }
        });
        return redirect('/home');
    }
}
