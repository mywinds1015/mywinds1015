@extends('layouts/app')

@section('content')

<div class="container">
    <h1>新增最新消息</h1>
<form method="POST" action="/home/news" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="img">主要圖片</label>
        <input type="file" class="form-control" id="img" name="img" required>
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
    <label for="content">Content</label>
    <input type="text" class="form-control" id="content"  name="content" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection
