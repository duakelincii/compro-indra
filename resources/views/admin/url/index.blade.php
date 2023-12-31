@extends('layouts.dashboard')
@section('title')
    URL
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data URL</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah URL</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="read">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{$item->url}}" target="_blank">{{$item->url}}</a></td>
                                <td>
                                    <button class="btn btn-circle btn-warning" onClick="show({{ $item->id }})"><i
                                            class="fa fa-edit"></i></button>
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $item->id }})"
                                        data-target="#DeleteModal" class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a>
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
            $.get("{{ url('admin/url/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create url')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function store() {
            var comment = $("#comment").val();
            var url_id = $("#url_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('url/store') }}",
                data: {
                    url_id: url_id,
                    comment: comment,
                },
                success: function(data) {
                    $(".close").click();
                    setInterval(function() {
                        read()
                    }, 5000);
                }
            });
        }

        function show(id) {
            $.get("{{ url('admin/url/') }}/" + id +'/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit url')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function update(id) {
            var url = $("#url").val();
            $.ajax({
                type: "get",
                url: "{{ url('jenishewan/update') }}/" + id,
                data: "url=" + url,
                success: function(data) {
                    $(".close").click();
                    setInterval(function() {
                        read()
                    }, 5000);
                }
            });
        }


        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.url.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
