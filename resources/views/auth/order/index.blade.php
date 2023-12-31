@extends('auth.layouts.master')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Когда отправлен</th>
                <th>Сумма</th>
                <th>Действия</th>
            </tr>
            @foreach ($orders as $order )

          <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}} </td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                    <td>{{$order->getFullSum()}} </td>
                    <td>
                        <div class="btn-group" role="group">
                            @if (Auth::user()->isAdmin())
                            <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-success" type="button">Открыть</a>
                            @else
                            <a href="{{route('person.order.show',$order->id)}}" class="btn btn-success" type="button">Открыть</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
