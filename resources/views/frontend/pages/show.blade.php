@extends('layouts.front')
@section('content')

    <div class="page-content">

        <div class="container">
            <h1>{{ $page->title }}</h1>
        </div>

        {!! $page->text !!}

    </div>

    <footer class="py-4 text-center">
        © 2021 БашТехОсмотр
    </footer>

@endsection