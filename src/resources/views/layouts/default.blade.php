<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gustavo Michels de Camargo">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <title>@yield("title")</title>
</head>

<body>
    <div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link{{ $currentPage == "home" ? " active" : "" }}" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link{{ $currentPage == "products" ? " active" : "" }}">Produtos</a></li>
        <li class="nav-item"><a href="#" class="nav-link{{ $currentPage == "tags" ? " active" : "" }}">Tags</a></li>
        </ul>
    </header>
    </div>
    <div class="container">
        @yield('content')  
    </div>
</body>

<script src="./js/bootstrap.min.js"></script>
</html>