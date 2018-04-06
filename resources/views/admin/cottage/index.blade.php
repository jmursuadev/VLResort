@extends('layouts.admin')
@section('content')
    <div class="modal fade" role="dialog" id="add_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add Cottage
                    </h5>
                    <button type="button" class="close" aria-labelledby="Close" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                </div>
                <form id="addform" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="room_name">Cottage name</label>
                                    {{ csrf_field() }}
                                    <input type="text" name="cottage_name" class="form-control" id="cottage_name" placeholder="Cottage name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="guestmax">Guest Max</label>
                                    <input type="text" name="guestmax" class="form-control" id="guestmax" placeholder="Guest Max"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="Price"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
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
                        Edit Cottage
                    </h5>
                    <button type="button" class="close" aria-labelledby="Close" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                </div>
                <form id="editform" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="cottage_name">Cottage name</label>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="text" name="cottage_name" class="form-control" id="editcottage_name" placeholder="Room name">
                                    <input type="hidden" id="cottage_id" name="cottage_id" value="0">
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
                                    <input type="text" name="guestmax" class="form-control" id="editguestmax" placeholder="Guest Max"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="editprice" placeholder="Price"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
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
                                    <label for="file">Photo Upload</label>
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
                    <h1>Cottages</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Add Cottage</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Add Cottage</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg mb-5">
                        <button type="button" class="btn btn-primary addcottage">Add Cottage</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Cottage Name</th>
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

        $("#addform").on('submit',function (e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url : "{{ route('admin.cottage.store') }}",
                method : "POST",
                data : formData,
                processData: false,
                contentType: false,
                beforeSend:function (data) {
                    swal({
                        title : '!',
                        text : 'Storing data, Please wait!',
                        type : 'success',
                        allowOutsideClick : false,
                        showCancelButton : false,
                        showConfirmButton : false,
                        onOpen: () => {
                        swal.showLoading()
                }
                });
                },
                success: function (data) {
                    swal.close();
                    toastr.success('Success!');
                    showdata();
                    $("#add_modal").modal('toggle');
                }
            });
        });

        $("#editform").on('submit',function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            var id = $("#cottage_id").val();
            $.ajax({
                url : "cottage/"+id,
                method : "POST",
                data : formData,
                processData: false,
                contentType: false,
                beforeSend:function (data) {
                    swal({
                        title : '!',
                        text : 'Updating, Please wait!',
                        type : 'success',
                        allowOutsideClick : false,
                        showCancelButton : false,
                        showConfirmButton : false,
                        onOpen: () => {
                        swal.showLoading()
                }
                });
                },
                success: function (data) {
                    swal.close();
                    toastr.success('Success!');
                    $("table").dataTable().fnDestroy();
                    showdata();
                    $("#edit_modal").modal('toggle');
                }
            });
        });

        $('#edit_modal').on('hidden.bs.modal', function () {
            $("#img").html('');
            $("#editfile").val('');
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
                    url : "cottage/"+id,
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

        $(document).on('click','.addcottage',function () {
            $("#add_modal").modal('toggle');
        });

        $(document).on('click','.edit',function () {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url : "cottage/"+$(this).data('id')+"/edit",
                success:function (data) {
                    $("#cottage_id").val(id);
                    $("#editcottage_name").val(data.cottage_name);
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
                url : "{{ route('admin.cottage.showdata') }}",
                success:function (data) {
                    $("table tbody").html(data);
                    $("table").DataTable();
                }
            });
        }
    </script>
@endsection