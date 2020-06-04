<div class="cat_menu_container" >

    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
        <div class="cat_burger"><span></span><span></span><span></span></div>
        <div class="cat_menu_text">Категории</div>
    </div>

    <ul class="cat_menu" style="display: none">
        @foreach ($categories as $category)
            <li>
                <a href="/shop/{{$category->slug}}">{{ $category->name }}<i class="fas fa-chevron-right"></i></a>
            </li>
        @endforeach
    </ul>

</div>
