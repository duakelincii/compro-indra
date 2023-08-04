<div class="p2">
    <form action="{{ route('admin.tiktok.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Tiktok Video ID <sup style="color: red">*Contoh : <a href="{{asset('assets/img/contoh_tiktok.png')}}" target="_blank" onclick="window.open('{{asset('assets/img/contoh_tiktok.png')}}', 'popup', 'height=500, width=500'); return false;">Show</a></sup></label>
                <input type="text" name="tiktok_id" placeholder="Title....." class="form-control" required>
                @error('tiktok_id')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-success">Create</button>
        </div>
    </form>
</div>
