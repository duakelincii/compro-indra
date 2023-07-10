<div class="p2">
    <form action="{{route('admin.faq.update',$item->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Question</label>
                <textarea type="text" name="question" placeholder="question....." class="form-control">{{$item->quetion}}</textarea>
                @error('question')
                    <span class="invalid-feedback" role="alert" <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="">Answer</label>
                <textarea type="text" name="answer" class="form-control">{{$item->answer}}<textarea>
                @error('answer')
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
