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
                    <a href="/">LOGO</a>
                    @foreach($goroda as $gorod)
                        @if($gorod->city_code == $city)
                        <button data-toggle="modal" data-target="#myModal">{{ $gorod->city }}</button>
                        @endif
                    @endforeach
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
            <li><a href="/city/ufa">Уфа</a></li>
            <li><a href="/city/agidel">Агидель</a></li>
            <li><a href="/city/baimak">Баймак</a></li>
            <li><a href="/city/belebey">Белебей</a></li>
            <li><a href="/city/beloretsk">Белорецк</a></li>
            <li><a href="/city/birsk">Бирск</a></li>
            <li><a href="/city/blagoveschensk">Благовещенск</a></li>
            <li><a href="/city/davlekanovo">Давлеканово</a></li>
            <li><a href="/city/dyurtyuli">Дюртюли</a></li>
            <li><a href="/city/ishimbai">Ишимбай</a></li>
            <li><a href="/city/kumertau">Кумертау</a></li>
            <li><a href="/city/mezhgoryie">Межгорье</a></li>
            <li><a href="/city/meleuz">Мелеуз</a></li>
            <li><a href="/city/neftekamsk">Нефтекамск</a></li>
            <li><a href="/city/oktyabrskiy">Октябрьский</a></li>
            <li><a href="/city/priyutovo">Приютово</a></li>
            <li><a href="/city/salavat">Салават</a></li>
            <li><a href="/city/sibay">Сибай</a></li>
            <li><a href="/city/sterlitamak">Стерлитамак</a></li>
            <li><a href="/city/tuymazy">Туймазы</a></li>
            <li><a href="/city/uchaly">Учалы</a></li>
            <li><a href="/city/chishmy">Чишмы</a></li>
            <li><a href="/city/yanaul">Янаул</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

    @yield('scripts')
</body>
</html>