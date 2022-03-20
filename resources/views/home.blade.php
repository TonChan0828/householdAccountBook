@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
            <h6>{{ $selectData['year'] }}年{{ $selectData['month'] }}月</h6>
    </div>
    <div class="card-body row  my-card-body">
        <div class="col-3">
            <h3>収入：{{ $selectData['incomeSum'] }}円</h3>
            @foreach ($selectData['income'] as $income)
                @if (!($income->balance))
                <p>{{ $income->name }} : {{ $income->sumAmount}}円</p>
                @endif
            @endforeach
        </div>
        <div class="col-3">
            <h3>収入：{{ $selectData['outgoSum'] }}円</h3>
            @foreach ($selectData['income'] as $outgo)
                @if (($outgo->balance))
                <p>{{ $outgo->name }} : {{ $outgo->sumAmount}}円</p>
                @endif
            @endforeach
        </div>
        <div class="col-6">
            <h3>収支：{{ $selectData['incomeSum'] - $selectData['outgoSum'] }}円</h3>

        </div>
    </div>
</div>
@endsection
