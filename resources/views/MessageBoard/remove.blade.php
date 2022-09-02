@extends('.layout')

@section('content')

@if ($deletelists->count() > 0)
<table class="table">
    <thead>
    <tr><th>ID</th><th>状態</th><th>タイトル</th><th></th><th></th>
    </thead>
    <tbody>
@foreach ($deletelists as $todo)
<tr>
        <td>{{ $todo->id }}</td>
        @if($todo->done==1)
        <td>完了</td>
        @elseif ($todo->done==0)
        <td>対応中</td>
        @else
        <td>?</td>
        @endif
        <td>{{ $todo->title }}</td>
        <td><a class="btn btn-outline-success" role="button" href="/MessageBoard/remove/{{ $todo->id }}">復元</a></td>
        <td><a class="btn btn-danger" role="button" href="/MessageBoard/delete/{{ $todo->id }}">完全に削除する</a></td>
    </tr>
@endforeach
</tbody>
</table>
@else
<p>ごみ箱は空です</p>
@endif

@endsection
