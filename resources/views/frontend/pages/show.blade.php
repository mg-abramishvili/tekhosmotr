@extends('layouts.front')
@section('content')

    <div class="page-content">

        <div class="container">
            <h1>{{ $page->title }}</h1>
        </div>

        @if($page->slug == 'kontakty')
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 page-content-left">
                    {!! $page->text !!}
                </div>
                <div class="col-12 col-md-6 page-content-right">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A553f255ca7d407bf229ba2ff15efd55960c887e302369a2b09c015cf2e4dc4c5&amp;width=100%25&amp;height=350&amp;lang=ru_RU&amp;scroll=false"></script>
                </div>
            </div>
        </div>
        @else
            {!! $page->text !!}
        @endif

    </div>

    <footer class="py-4 text-center">
        © 2021 БашТехОсмотр
    </footer>

@endsection