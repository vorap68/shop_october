@extends('auth.layouts.master')



    @isset($product)
    @section('title', 'Редактировать продукт')
    @else
    @section('title', 'Создать продукт')
    @endisset


@section('content')
    <div class="col-md-12">
        @isset($product)
        <h1>Редактировать продукт</h1>
        @else
        <h1>Добавить продукт</h1>
        @endisset
                  <form method="POST" enctype="multipart/form-data"

                      action="
                      @isset($product)
                      {{ route('products.update',$product->id) }}"
                      @else
                      {{ route('products.store') }}"
                      @endisset>
                      @isset($product)
                      @method('PUT')
                      @endisset
                      @csrf

                    <div>

                        <div class="input-group row">
                            <label for="code" class="col-sm-2 col-form-label">Код: </label>
                            <div class="col-sm-6">
                                @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                                <input type="text" class="form-control" name="code" id="code"
                                value="{{ old('code', isset($product) ? $product->code : null) }}">
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">Название: </label>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{old('name',isset($product->name) ? $product->name :  null )}}"  >
                            </div>

                        <br>
                        <div class="input-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                            <div class="col-sm-6">

                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @isset($product)
                                                @if($product->category_id == $category->id)
                                                selected
                                            @endif
                                            @endisset
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <br>
                        <div class="input-group row">
                            <label for="price" class="col-sm-2 col-form-label">Цена: </label>

                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                                <input type="text" class="form-control" name="price" id="price"
                                    value="{{old('price',isset($product->price) ? $product->price :  null )}}"  >
                         </div>

                            <br>
                        <div class="input-group row">
                            <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                            <div class="col-sm-6">

							<textarea name="description" id="description" cols="72"
                                      rows="7">{{old('description',isset($product->description) ? $product->description :  null )}}
                                    </textarea>
                            </div>
                        </div>
                        <br>



                        <div class="input-group row">
                            <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                            <div class="col-sm-10">
                                <label class="btn btn-default btn-file">
                                    Загрузить <input type="file"  name="image" id="image">
                                </label>
                            </div>
                        </div>


                        @foreach ([
                            'hit'=> 'Хит продаж',
                            'new'=> 'Новинка',
                             'recommend' => 'Рекомендуемый товар',
                            ] as $field=>$title)
                              <div class="input-group row">
                                <label for="{{$field}}" class="col-sm-2 col-form-label">{{$title}} </label>
                                <div class="col-sm-6">
                                     <input type="checkbox" name="{{$field}}" id="{{$field}}"
                                    @if(isset($product) && $product->$field === 1)
                                   checked="'checked"
                                @endif>

                                </div>
                            </div>
                        @endforeach

                        <br>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
    </div>
@endsection

