@extends('auth.layouts.master')

@section('title', 'Заказ')

@section('content')
    <div class="col-md-12">
        <h1>Заказ № {{ $order->id }}</h1>
        <p>Заказчик {{ $order->name }}</p>
        <p>Телефон{{ $order->phone }}</p>
        <table class="table">
            <tbody>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>

                </tr>
                @foreach ($order->products as $item)
                    <tr>
                        <td>
                            <img height="56px" src="{{ asset('storage/'.$item->image) }}">
                            {{ $item->name }}
                        </td>
                        <td>{{ $item->pivot->count }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price * $item->pivot->count }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость</td>
                    <td>{{ $order->getFullSum() }}</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
