<div class="p2">
    <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Question</label>
                <textarea name="question" placeholder="question....." class="form-control" required></textarea>
                @error('question')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Answer</label>
                <textarea name="answer" class="form-control" required></textarea>
                @error('answer')
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
