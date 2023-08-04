<div class="p2">
    <form action="{{ route('admin.blog.update', $item->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $item->title }}" placeholder="Title....."
                    class="form-control">
                @error('title')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Gambar</label>
                <input type="file" name="img" value="{{ $item->img }}" accept="image/jpg,image/png,image/jpeg"
                    class="form-control">
                @error('img')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Description</label>
                <textarea name="desc" id="desc" class="form-control">{{ $item->desc }}</textarea>
                @error('desc')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Meta Description</label>
                <textarea name="meta_desc" class="form-control">{{ $item->meta_desc }}</textarea>
                @error('meta_desc')
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
