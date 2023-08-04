@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keyword }}" />
    <meta name="description" content="{{ $setting->meta_desc }}" />
@endsection
@extends('frontend.master')
@section('content')
    <section>
        <div class="faq_area section_padding_130" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-lg-6">
                        <!-- Section Heading-->
                        <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <h3><span>Kumpulan </span> Pertanyaan & Jawaban</h3>
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
                            <a href="#"> Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
