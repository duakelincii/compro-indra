@extends('layouts.dashboard')
@section('title')
    Setting
@endsection
@section('content')
    <script>
        function loadImgPreview(event) {
            var output = $(event.target).parent().find('img')[0];
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nama Website</label>
                            <input type="text" name="nama_web" value="{{ $settings['nama_web'] }}" class="form-control">
                            @error('nama_web')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" value="{{ $settings['alamat'] }}" class="form-control">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control">{{ $settings['meta_keyword'] }}</textarea>
                            @error('meta_keyword')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Meta Description</label>
                            <textarea name="meta_desc" class="form-control">{{ $settings['meta_desc'] }}</textarea>
                            @error('meta_desc')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Description</label>
                            <textarea name="desc" class="form-control">{{ $settings['desc'] }}</textarea>
                            @error('desc')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $settings['email'] }}" class="form-control">
                            @error('email')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Phone</label>
                            <input type="telp" name="phone" value="{{ $settings['phone'] }}" class="form-control">
                            @error('phone')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nama Tiktok</label>
                            <input type="text" name="url_tiktok" value="{{ $settings['url_tiktok'] }}"
                                class="form-control">
                            @error('url_tiktok')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nama Facebook</label>
                            <input type="text" name="url_facebook" value="{{ $settings['url_facebook'] }}"
                                class="form-control">
                            @error('url_facebook')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nama Instagram</label>
                            <input type="text" name="url_instagram" value="{{ $settings['url_instagram'] }}"
                                class="form-control">
                            @error('url_instagram')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nama Youtube</label>
                            <input type="text" name="url_youtube" value="{{ $settings['url_youtube'] }}"
                                class="form-control">
                            @error('url_youtube')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Nama Twitter</label>
                            <input type="text" name="url_twitter" value="{{ $settings['url_twitter'] }}"
                                class="form-control">
                            @error('url_twitter')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Longitude</label>
                            <input type="text" name="long" value="{{ $settings['long'] }}" class="form-control">
                            @error('long')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Latitude</label>
                            <input type="text" name="lat" value="{{ $settings['lat'] }}" class="form-control">
                            @error('lat')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Logo</label>
                            <input type="file" name="logo" value="{{ $settings['logo'] }}" class="form-control">
                            @error('logo')
                                <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <img src="{{ $settings['logo'] }}" alt="" width="30%">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
