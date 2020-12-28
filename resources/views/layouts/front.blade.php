<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Техосмотр</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-2 header-logo">
                    <a href="/techpoints">LOGO</a>
                    <button data-toggle="modal" data-target="#myModal">Уфа</button>
                </div>
                <div class="col-12 col-lg-10 header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"><a href="#" class="nav-link"><span>Аккредитация</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><span>Законодательство</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><span>Метрологическое сопрвождение</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><span>Оборудование для ТО</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><span>Ремонт оборудования</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><span>Контакты</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <ul>
            <li><a href="#">Уфа</a></li>
            <li><a href="#">Агидель</a></li>
            <li><a href="#">Баймак</a></li>
            <li><a href="#">Белебей</a></li>
            <li><a href="#">Белорецк</a></li>
            <li><a href="#">Бирск</a></li>
            <li><a href="#">Благовещенск</a></li>
            <li><a href="#">Давлеканово</a></li>
            <li><a href="#">Дюртюли</a></li>
            <li><a href="#">Ишимбай</a></li>
            <li><a href="#">Кумертау</a></li>
            <li><a href="#">Межгорье</a></li>
            <li><a href="#">Мелеуз</a></li>
            <li><a href="#">Нефтекамск</a></li>
            <li><a href="#">Октябрьский</a></li>
            <li><a href="#">Приютово</a></li>
            <li><a href="#">Салават</a></li>
            <li><a href="#">Сибай</a></li>
            <li><a href="#">Стерлитамак</a></li>
            <li><a href="#">Туймазы</a></li>
            <li><a href="#">Учалы</a></li>
            <li><a href="#">Чишмы</a></li>
            <li><a href="#">Янаул</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

    @yield('scripts')
</body>
</html>