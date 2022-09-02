@extends('.layout')

@section('content')
<div class="m-5">
<form action="/MessageBoard/add" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">タイトル</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" aria-describedby="textHelp">
        <div id="textHelp" class="form-text">20文字以内
        <br>
        @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
        @endif
        </div>
    </div>

    <div class="mb-3">
        <label for="detail" class="form-label">詳細</label>
        <input type="text" class="form-control" name="detail" id="detail" value="{{old('detail')}}" aria-describedby="detailHelp">
        <div id="detailHelp" class="form-text">100文字以内
        @if ($errors->has('detail'))
        <span class="error">{{ $errors->first('detail') }}</span>
        @endif
        </div>
    </div>

    <div>
    <input type="hidden" name="done" id="done" value=0>
    <button class="btn btn-outline-success" type="submit" name="send">送信</button>
    @csrf
    </div>
</form>
</div>

@endsection
