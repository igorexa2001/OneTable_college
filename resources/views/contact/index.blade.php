@extends('layout.master')

@section('title', 'Contact')

@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset('css/contact_styles.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/contact_responsive.css')}}>
@endsection

@section('content')
    <div class="super_container">

        <!-- Contact Info -->
        <div class="contact_info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                            <!-- Contact Item -->
                            <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                                <div class="contact_info_image"><img src={{asset('images/contact_1.png')}} alt="" ></div>
                                <div class="contact_info_content">
                                    <div class="contact_info_title">Телефон</div>
                                    <div class="contact_info_text">{{settings('phone')}}</div>
                                </div>
                            </div>

                            <!-- Contact Item -->
                            <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                                <div class="contact_info_image"><img src={{asset('images/contact_2.png')}} alt=""></div>
                                <div class="contact_info_content">
                                    <div class="contact_info_title">Email</div>
                                    <div class="contact_info_text">{{settings('email')}}</div>
                                </div>
                            </div>

                            <!-- Contact Item -->
                            <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                                <div class="contact_info_image"><img src={{asset('images/contact_3.png')}} alt=""></div>
                                <div class="contact_info_content">
                                    <div class="contact_info_title">Адрес</div>
                                    <div class="contact_info_text">{{settings('address')}}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        @include('contact._contact_form')

    </div>

@endsection

@section('extraJs')
    <script src={{asset('js/contact_custom.js')}}></script>
@endsection
