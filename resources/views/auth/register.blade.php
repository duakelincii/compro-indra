<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penitipan Hewan - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('assets/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">



    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                                    </div>

                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" name="role" value="user">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="">Nama Lengkap : </label>
                                                <input id="name" type="text"
                                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                                    placeholder="Masukan Nama Lengkap Anda..." name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert"
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Username :</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLastName" name="username" alue="{{ old('username') }}"
                                                    placeholder="Masukan username Anda...." required
                                                    autocomplete="username" autofocus>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert"
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="">Email :</label>
                                                <input id="email" type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    placeholder="Masukan Email anda....." name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">No Handphone :</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLastName" name="phone" placeholder="No Handphone..."
                                                    alue="{{ old('phone') }}" required autocomplete="phone"
                                                    autofocus>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert"
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="">Password</label>
                                                <input id="password" type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    placeholder="Masukan Password Anda..." name="password" required
                                                    autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Ulangi Password</label>
                                                <input id="password-confirm" type="password"
                                                    class="form-control form-control-user"
                                                    placeholder="Ulangi Password Anda..." name="password_confirmation"
                                                    required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="">Alamat Lengkap :</label>
                                            <textarea name="alamat" class="form-control form-control-user @error('email') is-invalid @enderror" name="alamat"
                                            value="{{ old('alamat') }}" required autocomplete="alamat"></textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Daftar Akun') }}
                                        </button>
                                        <a
                                            href="{{ route('home') }}"class="btn btn-warning btn-user btn-block">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ URL::asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ URL::asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
