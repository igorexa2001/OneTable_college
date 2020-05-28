<div class="cat_menu_container" >

    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
        <div class="cat_burger"><span></span><span></span><span></span></div>
        <div class="cat_menu_text">categories</div>
    </div>

    <ul class="cat_menu" style="display: none">
        @foreach ($categories as $category)
            @if(!$category->childrenCategories->isEmpty())
                <li class="hassubs" ><a href="#">{{ $category->name }}<i class="fas fa-chevron-right"></i></a>
                <ul>
                    @foreach ($category->childrenCategories as $childCategory)

                        @include('layout.categories.child_category', ['child_category' => $childCategory])
                    @endforeach
                </ul>
                </li>
            @else
                <li>
                    <a href="/shop/{{$category->slug}}">{{ $category->name }}<i class="fas fa-chevron-right"></i></a>
                </li>
            @endif
        @endforeach
    </ul>

</div>
