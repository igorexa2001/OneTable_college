
<div class="characteristics">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            @foreach($deliveryMethods as $deliveryMethod)
                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src={{asset($deliveryMethod->path_to_logo)}} alt=""></div>
                        <div class="char_content">
                            <div class="char_title">{{$deliveryMethod->title}}</div>
                            <div class="char_subtitle">{{$deliveryMethod->description}}</div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>

