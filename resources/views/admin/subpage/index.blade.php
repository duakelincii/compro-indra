@extends('layouts.dashboard')
@section('title')
    Sub Page
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Page</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Sub Page</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="read">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Sub Page</th>
                            <th>Type</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Kode Bahasa</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->desc }}</td>
                                <td>{{ $item->lang }}</td>
                                <td>
                                    <button class="btn btn-circle btn-warning" onClick="show({{ $item->id }})"><i
                                            class="fa fa-edit"></i></button>
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $item->id }})"
                                        data-target="#DeleteModal" class="btn btn-circle btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function create() {
            $.get("{{ url('admin/subpage/create') }}", {}, function(data, status) {
                $("#transaksimodalLabel").html('Create subpage')
                $("#page2").html(data);
                $("#transaksimodal").modal('show');
                CKEDITOR.replace('desc', {
                    filebrowserUploadUrl: "{{ route('admin.image.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });
            });
        }


        function show(id) {
            $.get("{{ url('admin/subpage/') }}/" + id + '/edit', {}, function(data, status) {
                $("#transaksimodalLabel").html('Edit subpage')
                $("#page2").html(data);
                $("#transaksimodal").modal('show');
                CKEDITOR.replace('desc', {
                    filebrowserUploadUrl: "{{ route('admin.image.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.subpage.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
