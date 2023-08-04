@section('meta')
<meta name="keywords" content="{{$setting->meta_keyword}}" />
<meta name="description" content="{{$setting->meta_desc}}" />
@endsection
@extends('frontend.master')
@section('content')
{{-- <section class="py-5">
    <div class="container px-5">
        <h1 class="fw-bolder fs-5 mb-4">Company Blog</h1>
        <div class="card border-0 shadow rounded-3 overflow-hidden">
            <div class="card-body p-0">
                <div class="row gx-0">
                    <div class="col-lg-6 col-xl-5 py-lg-5">
                        <div class="p-4 p-md-5">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <div class="h2 fw-bolder">Article heading goes here</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique delectus ab doloremque, qui doloribus ea officiis...</p>
                            <a class="stretched-link text-decoration-none" href="#!">
                                Read more
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url('https://dummyimage.com/700x350/343a40/6c757d')"></div></div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Blog preview section-->
<section class="py-5">
    <div class="container px-5">
        <h2 class="fw-bolder fs-5 mb-4">Articel Terbaru</h2>
        <div class="row gx-5">
            @foreach ($blog as $blogs )
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <img class="card-img-top" src="{{$blogs->img}}" alt="..." width="600px" height="200px" />
                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ date('M d, Y', strtotime($blogs->created_at)) }}</div>
                        <a class="text-decoration-none link-dark stretched-link" href="{{route('blogDetail',$blogs->slug)}}"><div class="h5 card-title mb-3">{{$blogs->title}}</div></a>
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
@endsection
