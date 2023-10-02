<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">Новинка</span>
            @endif

            @if($product->isRecommend())
                <span class="badge badge-warning">Рекомендован</span>
            @endif

            @if($product->isHit())
                <span class="badge badge-danger">Хит продаж</span>
            @endif
        </div>
        <img src="{{ asset('storage/'.$product->image) }}"  height="240px">
        <div class="caption">
            <h3>{{$product->name}}</h3>
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
