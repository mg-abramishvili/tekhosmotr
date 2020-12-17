<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Техосмотр</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/jquery-3.4.1.min.js"></script>
</head>
<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-3 header-logo">
                    <a href="#">LOGO</a>
                </div>
                <div class="col-12 col-lg-9 header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"><a href="#" class="nav-link">Пункт меню</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Пункт меню</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Пункт меню</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @yield('scripts')
</body>
</html>