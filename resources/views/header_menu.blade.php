<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My places</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('places.showForm') ? 'active' : ''}}" href="{{route('places.showForm')}}">Создать место</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('photos.show_form') ? 'active' : ''}}" href="{{route('photos.show_form')}}">Добавить фотографию к месту</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('places.showPlacesList') ? 'active' : ''}}" href="{{route('places.showPlacesList')}}">Все места</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
