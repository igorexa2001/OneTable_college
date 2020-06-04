<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                @include('layout.categories.categories_menu')


                <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="/">Домашняя<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="/shop">Каталог<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="/blog">Новости<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="/contact">Обратная связь<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
