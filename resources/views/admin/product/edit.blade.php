<div class="p2">
    <form action="{{route('admin.product.update',$item->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Nama Product</label>
                <input type="text" name="name" placeholder="name....." value="{{$item->name}}" class="form-control">
                @error('name')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Price</label>
                <input type="number" name="price" value="{{$item->price}}" class="form-control">
                @error('desc')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
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
