<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('admin_index')}}">OneTable Админ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Магазин
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Добавить товар</a>
                        <a class="dropdown-item" href="#">Список товаров</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Добавить категорию</a>
                        <a class="dropdown-item" href="#">Список категорий</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Добавить бренд</a>
                        <a class="dropdown-item" href="#">Список брендов</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Новости
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Добавить новость</a>
                        <a class="dropdown-item" href="#">Список новостей</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Пользователи
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Добавить пользователя</a>
                        <a class="dropdown-item" href="#">Список пользователей</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Связь
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Список писем</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Добавить рассылку</a>
                        <a class="dropdown-item" href="#">Список подписчиков</a>
                    </div>
                </div>
            </li>
        </ul>
        <span class="navbar-text">
        <a href="{{route('home_page')}}"> Выход </a>
    </span>
    </div>
</nav>
