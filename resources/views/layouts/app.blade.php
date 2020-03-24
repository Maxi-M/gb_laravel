<html>
<head>
    <title>Welcome to - @yield('title')</title>
</head>
<body>
<div class="container">
    <div class="menu">
        <a href="/">First page</a>
    </div>
    <div class="menu">
        <a href="/second">Second page</a>
    </div>
    <div class="menu">
        <a href="/third">Third page</a>
    </div>
    @yield('content')
</div>
</body>
</html>
