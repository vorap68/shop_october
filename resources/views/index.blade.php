
@extends('layouts.master')

@section('content')
        <h1>Все товары</h1>

        <form action="{{route('index')}}" method="GET">
            @csrf
                      <div class="filters row">
                <div class="col-sm-6 col-md-3">
                    <label for="price_from">Цена от
                        @error('price_from')
                        <div class="alert alert-danger">{{$message}} </div>
                        @enderror
                        <input type="text" name="price_from"  size="6" value="{{ request()->price_from}}">
                    </label>
                    <label for="price_to">до
                        @error('price_to')
                        <div class="alert alert-danger">{{$message}} </div>
                        @enderror
                        <input type="text" name="price_to" id="price_to" size="6" value="{{ request()->price_to}}">
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="hit">
                        <input type="checkbox" name="hit" id="hit"  @if(request()->has('hit')) checked @endif> Хит
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="new">

                        <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif>  Новинка
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="recommend">
                        <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif>  Рекомендуем
                    </label>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="submit" class="btn btn-primary">Фильтр</button>
                    <a href="{{ route("index") }}" class="btn btn-warning">Сброс</a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('index')}}"></a>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($products  as $product )
               @include('cards.card')
            @endforeach

        </div>
        {{$products->links()}}
    @endsection
