@extends('layouts.app')

@section('content')
<ul>
  @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>

    <div class="card-body row  my-card-body">
      <div class="row">
        <div class="col">
          <form id="editData-form" action="editData" method="POST">
            @csrf
            <input type="hidden" name="timeId" value="{{ $selectData['time']->id }}">
            <input type="hidden" name="balance" value="0">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">収入カテゴリー</label>
                <input type="text" name="category" class="form-control" list="incomeCategory">
                <datalist id="incomeCategory">
                  @foreach ($categories as $category)
                    @if ($category->balance === 0)
                      <option value=" {{ $category->name }}">
                    @endif
                  @endforeach
                  </datalist>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">金額</label>
                <input type="number" name="price" class="form-control" id="income">
              </div>
              <div class="text-right me-3">
                <button type="submit" name="edit" value="add" class="btn btn-primary">追加</button>
                {{-- <button type="submit" name="edit" value="delete" class="btn btn-secondary">削除</button> --}}
              </div>
            </form>
        </div>

        <div class="col">
          <form id="editData-form" action="editData" method="POST">
            @csrf
            <input type="hidden" name="timeId" value="{{ $selectData['time']->id }}">
            <input type="hidden" name="balance" value="1">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">支出カテゴリー</label>
                <input type="text" name="category" class="form-control" list="outgoCategory">
                <datalist id="outgoCategory">
                  @foreach ($categories as $category)
                    @if ($category->balance === 1)
                      <option value=" {{ $category->name }}">
                    @endif
                  @endforeach
                  </datalist>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">金額</label>
                <input type="number" name="price" class="form-control" id="outgo">
              </div>
              <div class="text-right me-3">
                <button type="submit" name="edit" value="add" class="btn btn-primary">追加</button>
                {{-- <button type="submit" name="edit" value="delete" class="btn btn-secondary">削除</button> --}}
              </div>
            </form>
        </div>
      </div>
    </div>
@endsection
