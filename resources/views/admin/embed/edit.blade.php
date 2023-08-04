<div class="p2">
    <form action="{{ route('admin.embed.update',$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Position</label>
                <select name="position" id="" class="form-control">
                    <option value="">--Pilih Posisi--</option>
                    <option value="header" @if ($item->position == 'header') selected @endif>Header</option>
                    <option value="footer" @if ($item->position == 'footer') selected @endif>Footer</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Code Script</label>
                <textarea type="text" name="embed" id="embed" placeholder="Script....." class="form-control">{!!$item->embed!!}</textarea>
            </div>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-success">Update</button>
        </div>
    </form>
</div>
