<div class="p2">
    <form action="{{ route('admin.subpage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Name Sub Page</label>
                <input name="name" placeholder="name....." class="form-control" required>
                @error('name')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Type</label>
                <input name="type" placeholder="type....." class="form-control" required>
                @error('type')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Descrition</label>
                <textarea name="desc" id="desc" class="form-control" required></textarea>
                @error('desc')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Jenis Bahasa</label>
                <select name="lang" id="" class="form-control">
                    <option value="">--Pilih Bahasa--</option>
                    <option value="id">Bahasa Indonesia</option>
                    <option value="en">Bahasa Inggirs</option>
                </select>
                @error('lang')
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
