@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="container">

    <a href="/home/news/create" class="btn btn-success">新增最新消息</a >
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>img</th>
                <th>title</th>
                <th>sort</th>
                <th>content</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
          @foreach ($all_news as $item)
            <tr>
                <td>
                   <img width="100" src="{{$item->img}}" alt="">
                </td>
                <td>{{$item->title}}</td>
                <td>{{$item->sort}}</td>
                <td>{{$item->content}}</td>
                <td>
                    <a href="/home/news/{{$item->id}}/edit" class="btn btn-success btn-sm">修改</a>
                    <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>
                    <form id="delete-form-{{$item->id}}" action="/home/news/{{$item->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>

            </tr>
         @endforeach
        </tbody>
    </table>
</div>
@endsection


@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example').DataTable({
                $('#example').dataTable( {
                "order": [[ 2, 'asc' ]]} )
        });
        } );

        function show_confirm(id)
        {

            var r=confirm("你確定要刪除嗎？");

            if (r==true)
            {
                //使用者確認刪除

                document.getElementById('delete-form-'+id).submit();

            }

        }
</script>




@endsection


