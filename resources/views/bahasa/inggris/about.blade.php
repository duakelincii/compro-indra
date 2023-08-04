@section('meta')
<meta name="keywords" content="{{$setting->meta_keyword}}" />
<meta name="description" content="{{$setting->meta_desc}}" />
@endsection
@extends('frontend.master')
@section('content')
<section class="about_section mt-5">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{$about->logo}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <span>{{$setting->nama_web}}</span>
              </h2>
            </div>
            <p>{{$about->desc}}</p>
          </div>
        </div>
        <h2>Visi</h2>
        <p>{{$about->visi}}</p>
        <h2>Misi</h2>
        <p>{{$about->misi}}</p>
      </div>
    </div>
  </section>
@endsection
