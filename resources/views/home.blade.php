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

            <canvas id="myBarChart"></canvas>
            // <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
            <script>
                const ctx = document.getElementById("myBarChart");
                const myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['収支'],
                    datasets: [
                        {
                            label: '収入',
                            data: [{{ $selectData['incomeSum'] }}],
                            backgroundColor: "rgba(130,201,169,0.5)"
                        },{
                            label: '支出',
                            data: [{{ $selectData['outgoSum'] }}],
                            backgroundColor: "rgba(219,39,91,0.5)"
                        },
                    ]
                },
                options: {
                    scales: {
                    yAxes: [{
                        ticks: {
                        // suggestedMax: 20000,
                        suggestedMin: 0,
                        stepSize: 5000,
                        callback: function(value, index, values){
                            return  value +  '円'
                        }
                        }
                    }]
                    },
                }
                });
            </script>
        </div>
    </div>
@endsection
