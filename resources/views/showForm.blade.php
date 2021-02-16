@extends('layout', ['title'=>'Добавить место'])

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Добавить место</h1>
        </div>
        <div class="row">
            @if($errors->any())
                <div class="col-12 alert alert-danger">
                    <p>Ошибки:</p>
                    <ul>
                        @foreach($errors->all() as $err)
                            <li>
                                {{$err}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form  action="/places/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="placesInputName" class="form-label">Название места</label>
                    <input type="text" class="form-control" id="placesInputName" aria-describedby="nameHelp" name="name">
                    <div id="nameHelp" class="form-text">Введите название места, в котором вы были</div>
                </div>
                <div class="mb-3">
                    <label for="laravelInputType" class="form-label">Тип</label>
                    <select class="form-select" id="laravelInputType" name="places_type">
                        <option selected hidden>Тип</option>
                        <option value="Памятники" >Памятники</option>
                        <option value="Дворцы">Дворцы</option>
                        <option value="Мосты">Мосты</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Изображение</label>
                    <input class="form-control" type="file" id="formFile" name="image[]" multiple="multiple">
                </div>
                <div class="row">
                    <div class="col-4">
                        <a href="/places" class="btn btn-secondary">Назад</a>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success" name="action" value="stay">Добавить и остаться</button>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success" name="action" value="return">Добавить и вернуться</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
