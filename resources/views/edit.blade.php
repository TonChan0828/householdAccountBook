@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body row  my-card-body">
        <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">カテゴリー</label>
              <input type="text" class="form-control" id="category">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">値段</label>
              <input type="number" class="form-control" id="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
