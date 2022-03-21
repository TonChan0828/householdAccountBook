@extends('layouts.app')

@section('content')
    <div class="card-body row  my-card-body">
        <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">カテゴリー</label>
              <input type="text" class="form-control" list="category">
              <datalist id="category">
                <option value="サッカー">
                  <option value="野球">
                  <option value="ゴルフ">
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
              <button type="submit" class="btn btn-primary">追加</button>
            </div>
          </form>
    </div>
@endsection
