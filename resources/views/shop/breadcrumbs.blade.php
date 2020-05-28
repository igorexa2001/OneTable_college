
<nav aria-label="breadcrumb" style="background-color: white">
    <ol class="breadcrumb" style="padding-left: 100px; background-color: white">
            <li class="breadcrumb-item"><a href={{route('index')}}>OneTable</a></li>
        @if (isset($currentCategory))
            <li class="breadcrumb-item"><a href={{route('shop')}}>Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{$currentCategory->name}}
            </li>
        @else
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        @endif
    </ol>
</nav>
