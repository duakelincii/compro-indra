@extends('layouts.dashboard')
@section('title')
    Tiktok Video
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Tiktok</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Tiktok</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tiktok.status') }}" onsubmit="return check_mark();" method="post">
                @csrf
                <select class="browser-default custom-select w-25 mb-3" name="status_type">
                    <option selected value="null" readonly>Mark Data Status Menjadi</option>
                    <option value="1">Active</option>
                    <option value="0">Tidak</option>
                </select>

                <button class="btn btn-success mb-3">Apply</button>
                <div class="table-responsive">
                    <div id="read">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Tiktok Video</th>
                                <th>Status</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($tiktok as $item)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input"
                                                name="status[{{ $item->id }}]" id="status{{ $item->id }}">
                                            <label class="custom-control-label" for="status{{ $item->id }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $item->tiktok_id }}</td>
                                    <td>
                                        @if ($item->show == 1)
                                            <span class="badge badge-primary">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td width="30%"><a href="javascript:;" data-toggle="modal" onclick="showVideo({{$item->id}})"> Show Video</a> </td>
                                    <td>
                                        <a href="javascript:;" data-toggle="modal" class="btn btn-circle btn-success" onclick="show({{$item->id}})">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="javascript:;" data-toggle="modal"  onclick="deleteData({{ $item->id }})"
                                            data-target="#DeleteModal" class="btn btn-circle btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function create() {
            $.get("{{ url('admin/tiktok/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create Tiktok')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function showVideo(id) {
            $.get("{{ url('admin/tiktok/') }}/" + id + '/video', {}, function(data, status) {
                $("#exampleModalLabel").html('Video Tiktok')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        function show(id) {
            $.get("{{ url('admin/tiktok/') }}/" + id + '/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Tiktok')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.tiktok.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }


        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
