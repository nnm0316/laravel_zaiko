<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>タスク管理アプリ</title>
        <style>body {padding: 10px;}</style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- bootstrap.css を読み込みする -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/MessageBoard/index">タスク管理アプリ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="/MessageBoard/add">追加</a>
                    <a class="nav-link" href="/MessageBoard/remove">ごみ箱</a>
                </div>
              </div>
        </div>
    </nav>
        <form class="container-fluid" action="/MessageBoard/index" method="POST">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="done" id="inlineRadio1" value = null>
                <label class="form-check-label" for="inlineRadio1">すべて</label>
                </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="done" id="inlineRadio2" value=0>
                <label class="form-check-label" for="inlineRadio2">対応中</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="done" id="inlineRadio3" value=1>
                <label class="form-check-label" for="inlineRadio3">完了</label>
            </div>
        <div class="input-group">
            <input type="text" class="form-control" type="search" name="keywords" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
            @csrf

        </form>

    <hr>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
