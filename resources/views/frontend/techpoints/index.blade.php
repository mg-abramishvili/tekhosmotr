@extends('layouts.front')
@section('content')

@foreach($techpoints as $techpoint)
    {{ $techpoint->title }}
    {{ $techpoint->coordinates }}
@endforeach

@endsection