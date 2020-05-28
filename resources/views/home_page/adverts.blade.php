
{{--<div class="adverts">--}}
{{--    <div class="container">--}}
{{--        <div class="row col">--}}

{{--            <!-- Advert Item -->--}}
{{--            @foreach($articles as $article)--}}
{{--                <div class="col-lg-4 advert_col">--}}
{{--                    <div class="advert d-flex flex-row align-items-center justify-content-start">--}}
{{--                        <div class="advert_content">--}}
{{--                            <div class="advert_title"><a href=/blog/{{$article->slug}}>{{$article->title}}</a></div>--}}
{{--                            <div class="advert_text">{{$article->description}}</div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto"><div class="advert_image"><img src= {{asset($article->path_to_photo)}} alt=""></div></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="adverts">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title">Trends 2018</div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
                    </div>
                    <div class="ml-auto"><div class="advert_image"><img src="{{asset('images/products/product_3.png')}}" alt=""></div></div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_subtitle">Trends 2018</div>
                        <div class="advert_title_2">Sale -45%</div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto"><div class="advert_image"><img src="{{asset('images/products/product_22.png')}}" alt=""></div></div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title">Trends 2018</div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto"><div class="advert_image"><img src="{{asset('images/products/product_2.png')}}" alt=""></div></div>
                </div>
            </div>

        </div>
    </div>
</div>

