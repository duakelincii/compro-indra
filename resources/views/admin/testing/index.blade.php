@extends('layouts.dashboard')
@section('title')
    Blog
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Testing</h6>
            {{-- <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Blog</a>
            </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="read">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Kode Bahasa</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($abouts as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->desc }}</td>\
                                <td>{{ $item->lang }}</td>
                                <td>
                                    <button class="btn btn-circle btn-warning" onClick="show({{ $item->id }})"><i
                                            class="fa fa-edit"></i></button>
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
        function show(id) {
            $.get("{{ url('admin/testing/') }}/" + id + '/edit', {}, function(data, status) {
                $("#transaksiModalLabel").html('Edit blog')
                $("#page2").html(data);
                $("#transaksimodal").modal('show');
                CKEDITOR.replace('desc');
            });
        }


        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.blog.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
