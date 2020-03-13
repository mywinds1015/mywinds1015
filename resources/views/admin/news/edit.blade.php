@extends('layouts/app')

@section('content')

<div class="container">
    <h1>編輯最新消息</h1>
<form method="POST" action="/home/news/{{$news->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group">
        <label for="img">現有圖片</label>
        <img class="img-fluid "width="250" src="{{$news->img}}" alt="" required>
      </div>
    <div class="form-group">
        <label for="img">重新上傳圖片</label>
        <input type="file" class="form-control" id="img" name="img">
      </div>
      <div class="form-group">
        <label for="imges">內文圖片</label>
        <input type="file" class="form-control" id="imges" name="imges[]" required multiple>
      </div>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" required>
  </div>
  <div class="form-group">
    <label for="sort">Sort</label>
    <input type="number" min="0" class="form-control" id="sort" name="sort" required>
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <input type="text" class="form-control" id="content"  name="content" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection
