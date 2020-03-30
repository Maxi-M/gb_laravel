<html>
<head>
    <title>Welcome to - @yield('title')</title>
</head>
<body>
<div class="container">
    <div class="menu">
        <a href="<?= Route('Home') ?>">Главная</a>
    </div>
    <div class="menu">
        <a href="<?= Route('News') ?>">Новости</a>
    </div>
    <div class="menu">
        <a href="<?= Route('Categories') ?>">Категории новостей</a>
    </div>
    <div class="menu">
        <a href="<?= Route('NewsAdd') ?>">Добавить новость</a>
    </div>
    @yield('content')
</div>
</body>
</html>
