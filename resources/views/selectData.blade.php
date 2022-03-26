@extends('layouts.app')

@section('content')
    <div class="card-body row  my-card-body">
        <form id="editData-form" action="editData" method="POST">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">カテゴリー</label>
              <input type="text" class="form-control" list="category">
              <datalist id="category">
                @foreach ($categories as $item)
                    <option value=" {{ $item->name }}">
                @endforeach
                </datalist>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">金額</label>
              <input type="number" class="form-control" id="price">
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0">
              <label class="form-check-label" for="inlineCheckbox1">収入</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1">
              <label class="form-check-label" for="inlineCheckbox2">支出</label>
            </div>
            <div class="text-right me-3">
              <button type="submit" name="addData" class="btn btn-primary">追加</button>
              <button type="submit" name="deleteData" class="btn btn-primary">削除</button>
            </div>
          </form>
    </div>
@endsection
