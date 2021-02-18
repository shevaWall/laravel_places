@extends('layout', ['title'=>"$place->name"])

@section('content')
    <div class="container">
        <div class="row">
            <div class="h1 text-center">{{$place->name}}</div>
        </div>

        <div class="row">
            <div class="place-type">
                Тип: {{$place->places_type}}
            </div>
        </div>

        <div class="row">
            @foreach($place->image as $img)
                <div class="col-lg-3 col-md-4 col-6">
                    <img class="img-fluid" src="/storage/{{$img->image}}" alt="...">
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{route('places.showPlacesList')}}" class="btn btn-secondary">Назад</a>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('places.showFormAddPhoto', $place->id)}}" class="btn btn-primary">Добавить изображения</a>
            </div>
        </div>

    </div>
@endsection
