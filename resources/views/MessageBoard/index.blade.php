@extends('.layout')

@section('content')

<div class="container">
@if ($todolists->count() !=null)
<table class="table">
    <thead>
<tr><th>ID</th><th>状態</th><th></th><th>タイトル</th><th></th><th></th></tr>
    </thead>
    <tbody>
@foreach ($todolists as $todo)
@if($todo->trashed() == False)
    <tr>
        <th scope="row">{{ $todo->id }}</th>
        @if($todo->done==1)
        <td>完了</td>
        <td></td>
        @elseif ($todo->done==0)
        <td>対応中</td>
        <td><a href="/MessageBoard/change/{{ $todo->id }}">完了する</a></td>
        @endif
        <td><a href="/MessageBoard/detail/{{ $todo->id }}">{{ $todo->title }}</a></td>
        <td><a href="/MessageBoard/edit/{{ $todo->id }}">編集</a></td>
        <form action="/MessageBoard/delete/{{ $todo->id }}" method="post">
        <td>
            <input class="btn btn-danger" type="submit" name="delete" value="削除">
        </td>
        @csrf
        </form>
    </tr>
@endif
@endforeach
</tbody>
</table>
@else
<p>お問い合わせがありません</p>
@endif
</div>
@endsection
