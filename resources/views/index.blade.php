
@extends('layouts.master')

@section('content')
        <h1>Все товары</h1>

        <div class="row">
            @foreach ($products  as $product )
            @include('cards.card')
            @endforeach

        </div>
    @endsection
