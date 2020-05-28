<div class="sidebar_section">
    <div class="sidebar_title">Categories</div>
    <ul class="sidebar_categories">

        @foreach ($categories as $category)
            @if (isset($currentCategory))
                <li><a href="/shop/{{$category->id == $currentCategory->id ? '' : $category->slug}}"
                       style="{{$category->slug == $currentCategory->slug ? 'color: red' : ''}}">
                        {{ $category->name }}</a>
                </li>
            @else
                <li><a href="/shop/{{$category->slug}}">{{ $category->name }}</a></li>
            @endif

        @endforeach
    </ul>
</div>
