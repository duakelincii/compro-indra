@section('meta')
    <meta name="keywords" content="{{ $setting->meta_keyword }}" />
    <meta name="description" content="{{ $setting->meta_desc }}" />
@endsection
@extends('frontend.master')
@section('content')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                        </header>
                        <!-- Preview image figure-->
                        {{-- <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset($blog->img) }}" alt="..." /> --}}
                        </figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            {!! $testing->desc !!}
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
