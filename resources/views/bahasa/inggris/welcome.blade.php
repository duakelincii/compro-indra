@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keyword }}" />
    <meta name="description" content="{{ $setting->meta_desc }}" />
@endsection
@extends('frontend.master')
@section('content')
    <div class="parallax">
        <!-- slider section -->
        <section class="slider_section ">
            <div class="dot_design">
                <img src="{{ asset('front/images/dots.png') }}" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($banner as $key => $b)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-box">
                                            <h1 style="color: white">{{ $setting->nama_web }}</h1>
                                            <p style="color: white">{{ $b->title }}</p>
                                            {{-- <a href="">
                                                Contact Us
                                            </a> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="img-box">
                                            <img src="{{ $b->img }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <img src="{{ asset('front/images/prev.png') }}" alt="">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <img src="{{ asset('front/images/next.png') }}" alt="">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>
    </div>



    <section class="py-5 layout_padding">
        <div class="container px-5">
            <h2 class="heading_container heading_center">{{ $setting->nama_web }} <span>Tiktok Videos</span></h2>
            <div class="row gx-5">
                @if (!empty($tiktok))
                    @foreach ($tiktok as $data)
                        <div class="col-lg-4 mb-5">
                            <blockquote style="max-height: 500px;max-width: 605px;min-width: 325px;" class="tiktok-embed"
                                cite="https://www.tiktok.com/video/{{ $data->tiktok_id }}"
                                data-video-id="{{ $data->tiktok_id }}">
                                <section> <a target="_blank" href="https://www.tiktok.com/?refer=embed"> </a>
                                </section>
                            </blockquote>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- about section -->

    <section class="about_section mt-5">
        <div class="container  ">
            <div class="row">
                {{-- <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ $about->logo }}" alt="">
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About <span>{{ $setting->nama_web }}</span>
                            </h2>
                        </div>
                        <div class="ml-3">
                            <p>{!! $about->desc !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="faq_area " id="faq">
            <div class="container">
                <div class="row">
                    <!-- FAQ Area-->
                    <div class="col-12">
                        <div class="accordion faq-accordian" id="faqAccordion">
                            @foreach ($faq as $f)
                                <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="card-header" id="headingOne">
                                        <h6 class="mb-0 collapsed" data-toggle="collapse"
                                            data-target="#collapse{{ $f->id }}" aria-expanded="true"
                                            aria-controls="collapseOne">{{ $f->question }}<span
                                                class="lni-chevron-up"></span></h6>
                                    </div>
                                    <div class="collapse" id="collapse{{ $f->id }}" aria-labelledby="headingOne"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            <p>{{ $f->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->


    <section>
        <div class="faq_area section_padding_50" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="accordion faq-accordian" id="faqAccordion">
                            @if (count($subpage) > 0)
                                @foreach ($subpage as $sp)
                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s"
                                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0 collapsed" data-toggle="collapse"
                                                data-target="#collapse{{ $sp->id }}" aria-expanded="true"
                                                aria-controls="collapseOne">{{ $sp->name }}<span
                                                    class="lni-chevron-up"></span></h6>
                                        </div>
                                        <div class="collapse" id="collapse{{ $sp->id }}"
                                            aria-labelledby="headingOne" data-parent="#faqAccordion">
                                            <div class="card-body">
                                                <p>{!! $sp->desc !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <center>
                                    <span>Dont't Have Sub Pages</span>
                                </center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- treatment section -->

    {{-- <section class="treatment_section layout_padding">
        <div class="side_img">
            <img src="{{ asset('front/images/service.png') }}" alt="">
        </div>
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    {{ $setting->nama_web }} <span>Service</span>
                </h2>
            </div>
            <div class="row">
                @if (!empty($service))
                    @foreach ($service as $s)
                        <div class="col-md-6 col-lg-3">
                            <div class="box ">
                                <div class="img-box">
                                    <img src="{{ $s->img }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h4>{{ $s->title }}</h4>
                                    <p>{{ $s->ket }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section> --}}

    <!-- end treatment section -->


    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    <span>Testimonial</span>
                </h2>
            </div>
        </div>
        <div class="container px-0">
            <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    @if (!empty($testimonial))
                        @foreach ($testimonial as $item)
                            <div class="carousel-item active">
                                <div class="box">
                                    <div class="client_info">
                                        <div class="client_name">
                                            <h5>
                                                {{ $item->name }}
                                            </h5>
                                        </div>
                                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    </div>
                                    <p>
                                        {{ $item->desc }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->

    <section class="py-5 layout_padding">
        <div class="container px-5">
            <h2 class="heading_container heading_center">{{ $setting->nama_web }} <span>Product</span></h2>
            <div class="row gx-5">
                @foreach ($product as $p)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="{{ $p->img }}" alt="..." width="600px"
                                height="100%" />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#">
                                    <div class="h5 card-title mb-3">{{ $p->name }}</div>
                                </a>
                                <p class="card-text mb-0">@rupiah($p->price)</p>
                                <a href="#" class="btn btn-success btn-sm mt-2"><i class="fa fa-cart-plus"></i>
                                    Order Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bolder fs-5 mb-4">Blog News</h2>
            <div class="row gx-5">
                @foreach ($blog as $blogs)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="{{ $blogs->img }}" alt="..." width="600px"
                                height="100%" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ date('M d, Y', strtotime($blogs->created_at)) }}</div>
                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('blogDetail', $blogs->slug) }}">
                                    <div class="h5 card-title mb-3">{{ $blogs->title }}</div>
                                </a>
                                <p class="card-text mb-0">
                                    @php
                                        $firstPart = substr(strip_tags($blogs->desc, ['<br>']), 0, 250);
                                        $secondPart = strlen($blogs->desc) > 250 ? '...' : '';
                                        echo $firstPart . $secondPart;
                                    @endphp
                                </p>
                            </div>
                            {{-- <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small">
                                        <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="faq_area section_padding_130" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-lg-6">
                        <!-- Section Heading-->
                        <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <h3><span>Frequently </span> Asked Questions</h3>
                            <p></p>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- FAQ Area-->
                    <div class="col-12 col-sm-10 col-lg-8">
                        <div class="accordion faq-accordian" id="faqAccordion">
                            @foreach ($faq as $f)
                                <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="card-header" id="headingOne">
                                        <h6 class="mb-0 collapsed" data-toggle="collapse"
                                            data-target="#collapse{{ $f->id }}" aria-expanded="true"
                                            aria-controls="collapseOne">{{ $f->question }}<span
                                                class="lni-chevron-up"></span></h6>
                                    </div>
                                    <div class="collapse" id="collapse{{ $f->id }}" aria-labelledby="headingOne"
                                        data-parent="#faqAccordion">
                                        <div class="card-body">
                                            <p>{{ $f->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Support Button-->
                        <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp"
                            data-wow-delay="0.5s"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <i class="lni-emoji-sad"></i>
                            <p class="mb-0 px-2">Can't find your answers?</p>
                            <a href="https://wa.me/{{ $setting->phone }}"> Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- info section -->
    <section class="info_section ">
        <div class="container">
            <div class="info_top">
                <div class="info_logo">
                    <a href="">
                        <img src="{{ $setting->logo }}" alt="">
                    </a>
                </div>
            </div>
            <div class="info_bottom layout_padding2">
                <div class="row info_main_row">
                    <div class="col-md-6 col-lg-3">
                        <div class="info_contact">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    {{ $setting->alamat }}
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope"></i>
                                <span>
                                    {{ $setting->email }}
                                </span>
                            </a>
                        </div>
                        <div class="social_box">
                            <a href="{{ $setting->url_facebook }}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $setting->url_twitter }}">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://youtube.com{{ $setting->url_youtube }}">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="https://instagram/{{ $setting->url_instagram }}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_post">
                            <iframe src="" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end info_section -->





@endsection
