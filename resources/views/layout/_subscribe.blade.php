
<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{asset('images/send.png')}}" alt=""></div>
                        <div class="newsletter_title">Подписка на новости</div>
                        <div class="newsletter_text"><p>...и купоны с огромными скидками</p></div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{route('store_subscriber')}}" method="post" class="newsletter_form">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="newsletter_input form-control col-md-3" required="required" placeholder="Ваше имя" name="name">
                                <input type="email" class="newsletter_input form-control" required="required" placeholder="Ваш email адрес" name="email">
                                <button class="newsletter_button form-control col-md-3">Подписаться</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
