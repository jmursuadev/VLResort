@extends('layouts.admin')
@section('content')
    <div class="modal fade" role="dialog" id="add_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add Room
                    </h5>
                    <button type="button" class="close" aria-labelledby="Close" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                </div>
                <form id="addform" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="room_name">Room name</label>
                                    {{ csrf_field() }}
                                    <input type="text" name="room_name" class="form-control" id="room_name" placeholder="Room name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" PLACEHOLDER="Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="guestmax">Guest Max</label>
                                    <input type="text" name="guestmax" class="form-control" id="guestmax" placeholder="Guest Max">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="guestmax">Photo Upload</label>
                                    <input type="file" name="file" class="form-control" id="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="edit_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Room
                    </h5>
                    <button type="button" class="close" aria-labelledby="Close" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                </div>
                <form id="editform" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="room_name">Room name</label>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="text" name="room_name" class="form-control" id="editroom_name" placeholder="Room name">
                                    <input type="hidden" id="room_id" name="room_id" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="editdescription" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="guestmax">Guest Max</label>
                                    <input type="text" name="guestmax" class="form-control" id="editguestmax" placeholder="Guest Max">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="editprice" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <div id="img">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="guestmax">Photo Upload</label>
                                    <input type="file" name="file" class="form-control" id="editfile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Rooms</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Add Room</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Add Room</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg mb-5">
                        <button type="button" class="btn btn-primary addroom">Add Room</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Room Name</th>
                                    <th>Description</th>
                                    <th>Guest Max</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            showdata();
        });

        $('#edit_modal').on('hidden.bs.modal', function () {
            $("#img").html('');
            $("#editfile").val('');
        });

        $("#addform").on('submit',function (e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url : "{{ route('admin.room.store') }}",
                method : "POST",
                data : formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    toastr.success('Success!');
                    showdata();
                    $("#add_modal").modal('toggle');
                }
            });
        });

        $("#editform").on('submit',function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            var id = $("#room_id").val();
            $.ajax({
                url : "room/"+id,
                method : "POST",
                data : formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    toastr.success('Success!');
                    $("table").dataTable().fnDestroy();
                    showdata();
                    $("#edit_modal").modal('toggle');
                }
            });
        });



        $(document).on('click','.delete',function () {
            var id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url : "room/"+id,
                    method: "POST",
                    data: {
                        "_method" : "DELETE",
                        "_token" : "{{ csrf_token() }}"
                    },
                    success:function (data) {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        $("table").dataTable().fnDestroy();
                        showdata();
                    }
                });
            }
        })
        });

        $(document).on('click','.addroom',function () {
            $("#add_modal").modal('toggle');
        });

        $(document).on('click','.edit',function () {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url : "room/"+$(this).data('id')+"/edit",
                success:function (data) {
                    $("#room_id").val(id);
                    $("#editroom_name").val(data.room_name);
                    $("#editdescription").val(data.description);
                    $("#editguestmax").val(data.GuestMax);
                    $("#editprice").val(data.price);
                    $("#img").html('<img src="/storage/upload/'+data.url+'">');
                    $("#edit_modal").modal('toggle');
                }
            });
        });

        function showdata() {
            $.ajax({
                url : "{{ route('admin.room.showdata') }}",
                success:function (data) {
                    $("table tbody").html(data);
                    $("table").DataTable();
                }
            });
        }
    </script>
@endsection