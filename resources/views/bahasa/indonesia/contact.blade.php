@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keyword }}" />
    <meta name="description" content="{{ $setting->meta_desc }}" />
@endsection
@extends('frontend.master')
@section('content')
    <!-- contact section -->
    <section class="contact_section layout_padding-bottom mt-5">
        <div class="container">

            <card class="card">
                <iframe width="100%" height="500px" allowfullscreen="" style="border: 0;" frameborder="0" marginwidth="0"
                    src="https://maps.google.com/maps?q={{ $setting->lat }},{{ $setting->long }}&z=14&amp;output=embed"></iframe>
                <div class="card-body">
                    <table>
                        <tr>
                            <td><i class="fa fa-map-marker"></i></td>
                            <td>: </td>
                            <td>
                                {{ $setting->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-envelope"></i></td>
                            <td>: </td>
                            <td>{{ $setting->email }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-phone"></i></td>
                            <td>: </td>
                            <td>{{ $setting->phone }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-instagram"></i></td>
                            <td>: </td>
                            <td>{{ $setting->url_instagram }}</td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('front/images/tiktok.png') }}" width="15px"></td>
                            <td>: </td>
                            <td>{{ $setting->url_tiktok }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-facebook"></i></td>
                            <td>: </td>
                            <td>{{ $setting->url_facebook }}</td>
                        </tr>
                    </table>
                </div>
            </card>


        </div>
    </section>
    <section class="contact_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h2>Hubungi Kami
                </h2>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="form_container">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="name" placeholder="Full Name" />
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="text" name="phone" placeholder="Phone Number" />
                            </div>
                            <div>
                                <input type="text" name="text" class="message-box" placeholder="Message" />
                            </div>
                            <div class="btn_box">
                                <button>
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img-box">
                        <img src="images/contact-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
@endsection
