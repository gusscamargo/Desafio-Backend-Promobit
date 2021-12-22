<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gustavo Michels de Camargo">
    <link rel="stylesheet" type="text/css" href="/css/backToFuture.css">
    <title>Error</title>
</head>

<body>
    {{-- <embed name="backToFutureMusic" loop="true" hidden="true" src="./mp3/backToFuture.mp3"></embed> --}}
    
    <section class="notFound">
        <div class="img">
            <img src="https://assets.codepen.io/5647096/backToTheHomepage.png" alt="Back to the Homepage"/>
            <img src="https://assets.codepen.io/5647096/Delorean.png" alt="El Delorean, El Doc y Marti McFly"/>
        </div>
        <div class="text">
            <h1>404</h1>
            <h2>PAGE NOT FOUND</h2>
            <h3>BACK TO HOME?</h3>
            <a href="/home" class="yes">YES</a>
            <a href="https://www.youtube.com/watch?v=G3AfIvJBcGo">NO</a>
        </div>
    </section>
    <audio src="/mp3/backToFuture.mp3" autoplay>
</body>

<script src="/js/jquery-3.6.0.min.js"></script>
<script>
    audioElement.play();
</script>
</html>