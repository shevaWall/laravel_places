@extends('layout', ['title' => "добавить место для '$place->name'"])

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">{{$place->name}}</h1>
        </div>

        <div class="row">
            <div class="h2 text-center">Изображения:</div>
            @foreach($place->image as $img)
                <div class="col-lg-3 col-md-4 col-6">
                    <img class="img-fluid" src="/storage/{{$img->image}}" alt="...">
                </div>
            @endforeach

            <div class="h2 text-center mt-5">Добавить ещё</div>
            <form action="/places/{{$place->id}}/photos/add" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="place_id" value="{{$place->id}}">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Изображение</label>
                    <input class="form-control" type="file" id="formFile" name="image[]" multiple="multiple">
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="/places/{{$place->id}}" class="btn btn-secondary">Назад</a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
