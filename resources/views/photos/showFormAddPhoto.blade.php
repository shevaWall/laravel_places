@extends('layout', ['title'=>"Добавить изображение для"])

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Добавить изображение для места</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-12">
                <form class="form" action="{{route('photos.submit_form')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="choosePlace">1) Выберите место:</label>
                    <select name="place" id="choosePlace" class="form-select">
                        <option value="0" hidden selected>...</option>
                        @foreach($places as $place)
                            <option value="{{$place->id}}" {{old('place') == $place->id ? 'selected' : ''}}>{{$place->name}}</option>
                        @endforeach
                    </select>

                    <div class="my-3">
                        <label for="formFile" class="form-label">2) Добавьте изображение:</label>
                        <input class="form-control" type="file" id="formFile" name="image[]" multiple="multiple">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('index')}}" class="btn btn-secondary">Назад</a>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
