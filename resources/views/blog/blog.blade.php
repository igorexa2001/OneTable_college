@extends('layout.master')

@section('title', 'Blog')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/blog_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/blog_responsive.css")}}>
@endsection



@section('content')

    <!-- Blog -->

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
    <script src= {{asset('plugins/parallax-js-master/parallax.min.js')}}></script>
    <script src= {{asset('js/blog_custom.js')}}></script>
@endsection
