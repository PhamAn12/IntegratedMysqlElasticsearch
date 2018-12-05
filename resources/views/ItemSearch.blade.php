@extends('app')
@section('content')
<div class="container">
    <form class="form-inline" method="POST" action="test">
    {{ csrf_field() }}
    <label>ID</label>
    
  <div class="form-group mx-sm-3 mb-2">
    
    <input type="text" class="form-control" id="IdUniversity" name = 'IdUniversity' placeholder="Nhập Id..">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
</form>
</div>


@endsection