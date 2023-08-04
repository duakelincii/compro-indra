@extends('layouts.dashboard')
@section('title')
    Banner
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Banner</h6>
            <div>
                <a href="javascript:;" onclick="create()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Banner</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banner.status') }}" onsubmit="return check_mark();" method="post">
                @csrf
                <select class="browser-default custom-select w-25 mb-3" name="status_type">
                    <option selected value="null" readonly>Mark Data Status Menjadi</option>
                    <option value="1">Terima</option>
                    <option value="0">Tolak</option>
                </select>

                <button class="btn btn-success mb-3">Apply</button>
                <div class="table-responsive">
                    <div id="read">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($Data as $item)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input"
                                                name="status[{{ $item->id }}]" id="status{{ $item->id }}">
                                            <label class="custom-control-label" for="status{{ $item->id }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-primary">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td width="30%"><img src="{{ asset($item->img) }}" width="30%"></td>
                                    <td>
                                        <a href="javascript:;" onclick="show({{ $item->id }})"
                                            class="btn btn-circle btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $item->id }})"
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
            $.get("{{ url('admin/banner/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create banner')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        function store() {
            var comment = $("#comment").val();
            var banner_id = $("#banner_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('banner/store') }}",
                data: {
                    banner_id: banner_id,
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
            $.get("{{ url('admin/banner/') }}/" + id + '/edit', {}, function(data, status) {
                $("#exampleModalLabel").html('Edit banner')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function update(id) {
            var banner = $("#banner").val();
            $.ajax({
                type: "get",
                url: "{{ url('jenishewan/update') }}/" + id,
                data: "banner=" + banner,
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
            var url = '{{ route('admin.banner.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
