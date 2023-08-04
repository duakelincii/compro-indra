<body>

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="header_bottom">

                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('front/images/logo-nanomist.png') }}" alt="">
                        </a>


                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('welcome') }}">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    {{-- <li class="nav-item">
                  <a class="nav-link" href="{{route('about')}}"> About</a>
                </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('blog') }}">Articel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                    @if (!empty($url))
                                        @foreach ($url as $u)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ $u->url }}">{{ $u->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="nav-item">
                                            <a class="nav-link" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                @if ($properties['native'] == 'Bahasa Indonesia')
                                                    IND
                                                @else
                                                    ENG
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

            </div>
        </header>
        <!-- end header section -->
