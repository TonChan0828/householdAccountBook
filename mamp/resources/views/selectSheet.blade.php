@extends('layouts.app')

@section('content')
<ul>
@foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
  @endforeach
</ul>
<div class="card-body row  my-card-body">

  <form action="/editSheet" method="POST">
    @csrf
    <div class="row">
      <div class="mb-3 col">
        年
        <select name="year" class="form-select form-select-lg mb-3">
          <option selected>年を選択してください</option>
          @for ($i = 2000; $i <= 2030; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </div>
      <div class="mb-3 col">
        月
        <select name="month" class="form-select form-select-lg mb-3">
          <option selected>月を選択してください</option>
          @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
          @endfor
          </select>
      </div>
    </div>
    <div class="text-right me-3">
      <button type="submit" name="edit" value="add" class="btn btn-primary">追加</button>
      <button type="submit" name="edit" value="delete" class="btn btn-secondary">削除</button>
    </div>
  </form>
</div>
@endsection
