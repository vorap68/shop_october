<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="#iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}}</h3>
            <p>{{$product->price}}</p>
            <p>
                <form action="{{route('basket-add',$product)}}" method="POST">
                    @csrf
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    {{$product->category->name}}
                </form>
                <a href="{{route('product',$product)}}" class="btn btn-default"
                   role="button">Подробнее</a>
            </p>
        </div>
    </div>
</div>
