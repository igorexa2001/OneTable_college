<nav aria-label="breadcrumb" style="background-color: white">
    <ol class="breadcrumb" style="padding-left: 100px; background-color: white">
        <li class="breadcrumb-item"><a href={{route('index')}}>OneTable</a></li>
        <li class="breadcrumb-item"><a href={{route('blog')}}>Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
    </ol>
</nav>
