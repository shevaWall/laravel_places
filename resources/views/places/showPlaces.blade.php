@extends('layout' ,['title'=>"Мои места"])


@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Мои места</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Место</th>
                    <th scope="col">Тип</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($places as $place)
                    <tr>
                        <th scope="row">{{$place->id}}</th>
                        <td>{{$place->name}}</td>
                        <td>{{$place->places_type}}</td>
                        <td><a href="{{route('places.showPlaceInfo', $place->id)}}">посмотреть</a></td>
                        <td><a href="{{route('places.removePlace', $place->id)}}">удалить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center"><a href="{{route('places.showForm')}}">Добавить место</a></div>
        </div>
    </div>
@endsection
