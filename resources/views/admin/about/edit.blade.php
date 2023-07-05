<div class="p2">
    <form action="{{route('admin.about.update',$item->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Keterangan</label>
                <input type="text" name="desc" placeholder="keterangan....." value="{{$item->desc}}" class="form-control">
                @error('desc')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">visi</label>
                <input type="text" name="visi" value="{{$item->visi}}" class="form-control">
                @error('visi')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Misi</label>
                <input type="text" name="misi" value="{{$item->misi}}" class="form-control">
                @error('misi')
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
