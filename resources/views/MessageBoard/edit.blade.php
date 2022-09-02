@extends('.layout')

@section('content')

<div class="m-5">
    <form action="/MessageBoard/edit/{{$todo->id}}" method="POST">
        <div class="form-floating mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $todo->title)}}" aria-describedby="textHelp">
            <div id="textHelp" class="form-text">20文字以内
            <br>
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
            </div>
        </div>

        <div class="form-floating mb-3">
            <label for="detail" class="form-label">詳細</label>
            <input type="text" class="form-control" id="detail" name="detail" value="{{old('detail', $todo->detail)}}" aria-describedby="detailHelp">
            <div id="detailHelp" class="form-text">100文字以内
            @if ($errors->has('detail'))
            <span class="error">{{ $errors->first('detail') }}</span>
            @endif
            </div>
        </div>

        <div>
        <input type="hidden" name="done" id="done" value=0>
        <button class="btn btn-outline-success" type="submit" name="send">変更</button>
        @csrf
        </div>
    </form>
    </div>

@endsection
