<div class="p2">
    <form action="{{ route('admin.about.update', $item->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea name="desc" id="desc" class="form-control">{{ $item->desc }}</textarea>
                @error('desc')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea name="visi" id="visi" class="form-control">{{ $item->visi }}</textarea>
                @error('visi')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea name="misi" id="misi" class="form-control">{{ $item->misi }}</textarea>
                @error('misi')
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
