<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gustavo Michels de Camargo">
    <link rel="icon" href="/image/icon.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <title>@yield("title")</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-11">
                <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/home" class="nav-link{{ $currentPage == "home" ? " active" : "" }}" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="/product" class="nav-link{{ $currentPage == "product" ? " active" : "" }}">Produtos</a></li>
                    <li class="nav-item"><a href="/tag" class="nav-link{{ $currentPage == "tag" ? " active" : "" }}">Tags</a></li>
                </ul>
            </header>
            </div>
            <div class="col-1" style="margin-top: 10px">
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')  
    </div>


</body>

<script src="/js/jquery-3.6.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</html>