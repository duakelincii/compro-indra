<div class="p2">
    <form action="{{ route('admin.service.update', $item->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Title</label>
                <input type="text" name="title" placeholder="Title....." value="{{ $item->title }}"
                    class="form-control">
                @error('title')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Description</label>
                <input type="text" name="ket" value="{{ $item->ket }}" class="form-control">
                @error('ket')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Gambar</label>
                <input type="file" name="img" accept="image/jpg,image/png,image/jpeg" value="{{ $item->img }}"
                    class="form-control">
                @error('img')
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
                    <option value="id" @if ($item->lang == 'id') selected @endif>Bahasa Indonesia</option>
                    <option value="en" @if ($item->lang == 'en') selected @endif>Bahasa Inggirs</option>
                </select>
                @error('lang')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-success">Update</button>
        </div>
    </form>
</div>
