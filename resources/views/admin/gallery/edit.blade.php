<div class="p2">
    <form action="{{route('admin.gallery.update',$item->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Gambar</label>
                <input type="file" name="img" accept="image/jpg,image/png,image/jpeg" value="{{$item->img}}" class="form-control">
                @error('img')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-success" >Update</button>
        </div>
    </form>
</div>
