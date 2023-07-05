@extends('layouts.dashboard')
@section('title')
    Blog
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Blog</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Blog</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="read">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Text</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->desc }}</td>
                                <td width="30%"><img src="{{asset($item->img)}}" width="30%"></td>
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
            $.get("{{ url('admin/blog/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create blog')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function store() {
            var comment = $("#comment").val();
            var blog_id = $("#blog_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('blog/store') }}",
                data: {
                    blog_id: blog_id,
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
            $.get("{{ url('admin/blog/') }}/" + id +'/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit blog')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function update(id) {
            var blog = $("#blog").val();
            $.ajax({
                type: "get",
                url: "{{ url('jenishewan/update') }}/" + id,
                data: "blog=" + blog,
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
            var url = '{{ route('admin.blog.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
