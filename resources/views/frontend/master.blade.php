@include('frontend._include.header')
@include('frontend._include.navbar')

@include('sweetalert::alert')
@yield('content')
@include('frontend._include.footer')
