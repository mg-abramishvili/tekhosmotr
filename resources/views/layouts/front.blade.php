<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Техосмотр</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/flickity.css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/flickity.min.js"></script>
</head>
<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-2 header-logo">
                    <a href="/">LOGO</a>
                    <div class="city-ch">
                    Ваш город: 
                        @foreach($goroda as $gorod)
                            @if($gorod->city_code == $city)
                            <button data-toggle="modal" data-target="#myModal">{{ $gorod->city }}</button>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-10 header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"><a href="/p/akkreditaciya/" class="nav-link"><span>Аккредитация</span></a></li>
                                <li class="nav-item"><a href="/p/zakonodatelstvo" class="nav-link"><span>Законодательство</span></a></li>
                                <li class="nav-item"><a href="/p/metroligicheskoe-soprovozhdenie" class="nav-link"><span>Метрологическое сопрвождение</span></a></li>
                                <!--<li class="nav-item"><a href="#" class="nav-link"><span>Оборудование для ТО</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><span>Ремонт оборудования</span></a></li>-->
                                <li class="nav-item"><a href="/p/kontakty" class="nav-link"><span>Контакты</span></a></li>
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
            @foreach($goroda as $gorod)
                
                <li><a @if($gorod->techpoints->count() > 0) href="/city/{{$gorod->city_code}}" @endif>{{$gorod->city}} ({{$gorod->techpoints->count()}})</a></li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

    @yield('scripts')
</body>
</html>