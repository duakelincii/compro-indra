@extends('layouts.dashboard')
@section('title')
    About
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data About</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah About</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="read">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Keterangan</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->desc }}</td>
                                <td>{{ $item->visi }}</td>
                                <td>{{ $item->misi }}</td>
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
            $.get("{{ url('admin/about/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create about')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function store() {
            var comment = $("#comment").val();
            var about_id = $("#about_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('about/store') }}",
                data: {
                    about_id: about_id,
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
            $.get("{{ url('admin/about/') }}/" + id +'/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit about')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function update(id) {
            var about = $("#about").val();
            $.ajax({
                type: "get",
                url: "{{ url('jenishewan/update') }}/" + id,
                data: "about=" + about,
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
            var url = '{{ route('admin.about.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
