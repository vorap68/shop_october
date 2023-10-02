@extends('auth.layouts.master')



    @isset($category)
    @section('title', 'Редактировать категорию')
    @else
    @section('title', 'Создать категорию')
    @endisset


@section('content')
    <div class="col-md-12">
        @isset($category)
        <h1>Редактировать Категорию</h1>
        @else
        <h1>Добавить Категорию</h1>
        @endisset
                  <form method="POST" enctype="multipart/form-data"

                      action="
                      @isset($category)
                      {{ route('categories.update',$category->id) }}"
                      @else
                      {{ route('categories.store') }}"
                      @endisset>


                    <div>

                        @isset($category)
                        @method('PUT')
                        @endisset
                        @csrf
                        <div class="input-group row">
                            <label for="code" class="col-sm-2 col-form-label">Код: </label>
                            <div class="col-sm-6">
                            @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                                <input type="text" class="form-control" name="code" id="code"
                                value="{{ old('code', isset($category->code) ? $category->code : null )}}">
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">Название: </label>
                            <div class="col-sm-6">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror

                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{old('name',isset($category->name) ? $category->name :  null)}}"  >
                            </div>
                        </div>



                            <br>
                        <div class="input-group row">
                            <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                            <div class="col-sm-6">
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
							<textarea name="description" id="description" cols="72"
                                      rows="7">{{old('description',isset($category->description) ? $category->description :  null)}}
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


                        <br>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
    </div>
@endsection

