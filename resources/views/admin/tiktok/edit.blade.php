<div class="p2">
    <form action="{{route('admin.tiktok.update',$item->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Title</label>
                <input type="text" name="title" placeholder="Title....." value="{{$item->tiktok_id}}" class="form-control">
                @error('title')
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
