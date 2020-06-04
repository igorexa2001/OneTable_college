<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OneTable</a></div>

                        <div class="footer_contact_text">
                            <p>{{settings('address')}}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Есть вопросы? Наш телефон:</div>
                    <div class="footer_phone">{{settings('phone')}}</div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Популярные категории</div>
                    <ul class="footer_list">
                        @foreach($categories as $category)
                            <li><a href='/shop/{{$category->slug}}'>{{$category->name}}</a></li>
                            @if($category->id == 3)
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
