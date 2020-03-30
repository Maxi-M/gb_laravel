<html>
<head>
    <title>Welcome to - @yield('title')</title>
</head>
<body>
<div class="container">
    <div class="menu">
        <a href="/">Главная</a>
    </div>
    <div class="menu">
        <a href="/news">Новости</a>
    </div>
    <div class="menu">
        <a href="/category">Категории новостей</a>
    </div>
    <div class="menu">
        <a href="/news/add">Добавить новость</a>
    </div>
    @yield('content')
</div>
</body>
</html>
