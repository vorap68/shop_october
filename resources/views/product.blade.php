
@extends('layouts.master')

@section('content')
        <h1>{{$product->name}}</h1>
        <p>Цена: <b>{{$product->price}}</b></p>
        <img src="#">
        <p>{{$product->description}}</p>
        <a class="btn btn-success" href="{{route('basket')}}">Добавить в корзину</a>
@endsection
