<div class="p2">
    <form action="{{ route('admin.testing.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">keterangan</label>
                <input type="text" name="desc" placeholder="keterangan....." class="form-control" required>
                @error('keterangan')
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
