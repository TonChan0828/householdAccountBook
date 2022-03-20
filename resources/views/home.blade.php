@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        @foreach ($selectTime as $item)
            <h6>{{ $item->year }}年{{ $item->month }}月</h6>
        @endforeach

    </div>
    <div class="card-body row  my-card-body">
        <div class="col-3">
            <h3>収入：200,000円</h3>
            <p>カテゴリ−1：1,000円</p>
            <p>カテゴリ−2：1,000円</p>
            <p>カテゴリ−3：1,000円</p>
            <p>カテゴリ-4：1,000円</p>
            <p>カテゴリ-5：1,000円</p>
            <p>カテゴリ-6：1,000円</p>
            <p>カテゴリ-7：1,000円</p>
            <p>カテゴリ-8：1,000円</p>
            <p>カテゴリ-9：1,0000円</p>
            <p>カテゴリ-10：1,0000円</p>
        </div>
        <div class="col-3">
            <h3>支出：150,000円</h3>
            <p>カテゴリ-11：1,000円</p>
            <p>カテゴリ-12：1,000円</p>
            <p>カテゴリ-13：1,000円</p>
            <p>カテゴリ-14：1,000円</p>
            <p>カテゴリ-15：1,000円</p>
            <p>カテゴリ-16：1,000円</p>
            <p>カテゴリ-17：1,000円</p>
            <p>カテゴリ-18：1,000円</p>
            <p>カテゴリ-19：1,0000円</p>
            <p>カテゴリ-20：1,0000円</p>
        </div>
        <div class="col-6">
            <h3>収支：50,000円</h3>

        </div>
    </div>
</div>
@endsection
