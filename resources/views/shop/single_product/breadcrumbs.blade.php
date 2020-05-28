<nav aria-label="breadcrumb" style="background-color: white">
    <ol class="breadcrumb" style="padding-left: 100px; background-color: white">
        <li class="breadcrumb-item"><a href={{route('index')}}>OneTable</a></li>
        <li class="breadcrumb-item"><a href={{route('shop')}}>Shop</a></li>
        <li class="breadcrumb-item"><a href={{route('shop_category',[$product->category()->first()->slug])}}>{{$product->category()->first()->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</nav>
