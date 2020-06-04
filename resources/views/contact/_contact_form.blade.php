
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Написать нам сообщение</div>


                    {{Form::open(['route' => 'feedback_send', 'method' => 'post'])}}
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Ваше имя" required="required" data-error="Вы не можете оставить это поле пустым" name="name">
                            <input type="email" id="contact_form_email" class="contact_form_email input_field" placeholder="Ваш email" required="required" data-error="Вы не можете оставить это поле пустым" name="email">
                            <input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Ваш номер телефона" name="phone" >
                        </div>
                        <div class="contact_form_text">
                            <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Сообщение" required="required" data-error="Вы не можете оставить это поле пустым"></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="button contact_submit_button">Отправить сообщение</button>
                        </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
</div>
