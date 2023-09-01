@extends('layouts.dashboard')
@section('title')
    Testimonial
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Testimonial</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Testimonial</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="read">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Kode Bahasa</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
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
            $.get("{{ url('admin/testimonial/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create testimonial')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function show(id) {
            $.get("{{ url('admin/testimonial/') }}/" + id + '/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit testimonial')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.testimonial.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
