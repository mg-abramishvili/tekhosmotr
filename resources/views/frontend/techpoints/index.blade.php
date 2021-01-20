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
                            <span class="address">@foreach($techpoint->cities as $ct) {{ $ct->city }}{{''}}@endforeach, {{ $techpoint->address }}</span>
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
                @if($city == 'ufa')
                center: [54.753185705515016,55.98859607958987],
                @elseif($city == 'agidel')
                center: [55.908729165717716,53.933889071044874],
                @elseif($city == 'baimak')
                center: [52.597899797551335,58.31284774072266],
                @elseif($city == 'belebey')
                center: [54.10543457529205,54.11466284399413],
                @elseif($city == 'beloretsk')
                center: [53.96829919244161,58.39805735449212],
                @elseif($city == 'birsk')
                center: [55.40521323087281,55.527466859863324],
                @elseif($city == 'blagoveschensk')
                center: [55.0510757130606,55.96939267724606],
                @elseif($city == 'davlekanovo')
                center: [54.21430607814644,55.021611460327094],
                @elseif($city == 'dyurtyuli')
                center: [55.4797741027731,54.87879877758778],
                @elseif($city == 'ishimbai')
                center: [53.44996156609306,56.044534854492134],
                @elseif($city == 'kumertau')
                center: [52.76432982799722,55.80269028564449],
                @elseif($city == 'mezhgoryie')
                center: [54.20146283272981,57.94481543199657],
                @elseif($city == 'meleuz')
                center: [52.96600486516909,55.949204999999964],
                @elseif($city == 'neftekamsk')
                center: [56.079015525661234,54.279416499999904],
                @elseif($city == 'oktyabrskiy')
                center: [54.49483609662691,53.505433277832],
                @elseif($city == 'priyutovo')
                center: [53.897923188537206,53.92752849999999],
                @elseif($city == 'salavat')
                center: [53.354462320376484,55.91623372753903],
                @elseif($city == 'sibay')
                center: [52.715150469984295,58.68255399999999],
                @elseif($city == 'sterlitamak')
                center: [53.65637175654299,55.98083899999996],
                @elseif($city == 'tuymazy')
                center: [54.59935436706562,53.711622499999955],
                @elseif($city == 'uchaly')
                center: [54.31151553053144,59.39835799999994],
                @elseif($city == 'chishmy')
                center: [54.592393262396484,55.39149450000001],
                @elseif($city == 'yanaul')
                center: [56.265649471577966,54.947286999999925],
                @elseif($city == 'abzelil')
                center: [53.4178492637256,59.02243690625001],
                @elseif($city == 'alsheev')
                center: [54.04965528226654,54.937304074218694],
                @elseif($city == 'askin')
                center: [56.09069854119338,56.599081707031246],
                @elseif($city == 'aurgaz')
                center: [54.028198914750135,55.919483999999926],
                @elseif($city == 'bakal')
                center: [55.16431708075947,53.78861470703128],
                @elseif($city == 'buraev')
                center: [55.84056295355351,55.403195140624995],
                @elseif($city == 'burza')
                center: [53.214030220631244,57.51948249999991],
                @else
                center: [54.753185705515016,55.98859607958987],
                @endif
                zoom: 11
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
                balloonContent: '{{$techpoint->title}}<br><br><a class="btn btn-sm btn-primary" href="/techpoint/{{ $techpoint->id }}">Записаться</a>'
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