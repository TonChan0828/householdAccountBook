@extends('layouts.app')

@section('content')
    {{-- ToDo:テーブル表示に変更 --}}
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
@endsection
