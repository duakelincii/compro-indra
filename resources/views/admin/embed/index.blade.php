@extends('layouts.dashboard')
@section('title')
    Embed Script
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Embed</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Embed</a>
            </div>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <div id="read">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Embed</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($embed as $item)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input"
                                                name="status[{{ $item->id }}]" id="status{{ $item->id }}">
                                            <label class="custom-control-label" for="status{{ $item->id }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $item->embed }}</td>
                                    <td><span class="badge badge-primary">{{$item->position}}</span></td>
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
            $.get("{{ url('admin/embed/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create embed')
                $("#page").html(data);
                $("#exampleModal").modal('show');
                CKEDITOR.replace('embed');
            });
        }


        function show(id) {
            $.get("{{ url('admin/embed/') }}/" + id + '/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit embed')
                $("#page").html(data);
                $("#exampleModal").modal('show');
                CKEDITOR.replace('embed');
            });
        }


        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.embed.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }


        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
