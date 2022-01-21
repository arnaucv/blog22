<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>posts</title>
</head>
<body>
    <header>
        <div>
            <div><h1>My posts</h1></div>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="/about">About</a></li>
        </ul>
    </nav>
    <div class="container">
        @yield('contents')
    </div>
    <footer>

    </footer>
</body>
</html>