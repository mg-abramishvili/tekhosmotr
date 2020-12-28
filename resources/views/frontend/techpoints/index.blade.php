@extends('layouts.front')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 left-panel">
                <div class="search">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Поиск по названию, адресу...">
                </div>
                <div class="main-techpoints-list" id="main-techpoints-list">
                    @foreach($techpoints as $techpoint)
                    <div class="main-techpoints-list-item">
                        <a href="/techpoint/{{ $techpoint->id }}">
                            <p class="title">{{ $techpoint->title }}</p>
                            <span class="address">{{ $techpoint->address }}</span>
                            <span class="tel">{{ $techpoint->tel }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-9 right-panel">
                <div class="main-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=2493318c-8f60-438f-a8be-1cf6ef94a38d" type="text/javascript"></script>

    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                center: [54.753185705515016,55.98859607958987],
                zoom: 12
            }, {
                searchControlProvider: 'yandex#search'
            }),

            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),

            @foreach($techpoints as $techpoint)
            placemark{{ $techpoint->id }} = new ymaps.Placemark([{{$techpoint->coordinates}}], {
                hintContent: '{{$techpoint->title}}',
                balloonContent: '{{$techpoint->title}}<br><br><a class="btn btn-sm btn-primary" href="/techpoints/{{ $techpoint->id }}">Записаться</a>'
            },                
            {
                iconLayout: 'default#image',
                iconImageHref: '/img/repairing-service.svg',
                iconImageSize: [40, 40],
                iconImageOffset: [-20, -20]
            });
            @endforeach

            myMap.geoObjects
                @foreach($techpoints as $techpoint)
                    .add(placemark{{$techpoint->id}})
                @endforeach

            //myMap.behaviors.disable('scrollZoom');
            myMap.controls.remove('searchControl');
            myMap.controls.remove('trafficControl');
        });
    </script>

<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("main-techpoints-list");
        li = ul.getElementsByTagName("div");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
@endsection