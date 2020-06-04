@extends('layout.master')

@section('title', $article->title)

@section('styles')
<link rel="stylesheet" type="text/css" href={{ asset('css/blog_single_styles.css') }}>
<link rel="stylesheet" type="text/css" href={{ asset('/css/blog_single_responsive.css') }}>
@endsection

@section('content')
<!-- Single Blog Post -->
<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="single_post_title">{{$article->title}}</div>
                <div class="single_post_text">
                    <p>{{$article->text}}</p>

{{--                    <div class="single_post_quote text-center">--}}
{{--                        <div class="quote_image"><img src="../images/quote.png" alt=""></div>--}}
{{--                        <div class="quote_text">Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</div>--}}
{{--                        <div class="quote_name">Liam Neeson</div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Posts -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                    <!-- Blog post -->
                    @foreach($articles as $article)
                        <div class="blog_post">
                            <div class="blog_image" style="background-image: url({{asset($article->path_to_photo)}})"></div>
                            <div class="blog_text">{{$article->title}}</div>
                            <div class="blog_button"><a href="/blog/{{$article->slug}}">Подробнее...</a></div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extraJs')
    <script src= {{asset('js/blog_single_custom.js')}}></script>
@endsection
