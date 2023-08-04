@extends('layouts.dashboard')
@section('title')
 Pesan
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Pesan</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <div id="read">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                            </tr>
                            @foreach ($message as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->text}}</td>
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
