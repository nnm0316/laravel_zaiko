@extends('.layout')

@section('content')



@if ($todolist != null)
<div class="m-5">
    <h3>{{ $todolist->title }}の詳細</h3>
<br>
<table class="table">
    <tbody>
      <tr>
        <th scope="row">id</th>
        <td>{{ $todolist->id }}</td>
      </tr>
      <tr>
        <th scope="row">状態</th>
        @if($todolist->done==True)
        <td>完了</td>
        @elseif ($todolist->done==False)
        <td>対応中</td>
        @endif
      </tr>
      <tr>
        <th scope="row">タイトル</th>
        <td colspan="2">{{ $todolist->title }}</td>
      </tr>
      <tr>
        <th scope="row">詳細</th>
        <td colspan="2">{{ $todolist->detail }}</td>
      </tr>
    </tbody>
  </table>
</div>
@else
<a>データがありません</a>
@endif

@endsection
