@extends('layouts.admin')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Booking</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Approved</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Manage Reservation</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Room</th>
                                    <th>No of rooms</th>
                                    <th>Cottages</th>
                                    <th>No of cottages</th>
                                    <th>Check out</th>
                                    <th>Pax</th>
                                    <th>Price</th>
                                    <th>Remarks</th>
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
            var id = $("#cottage_id").val();
            $.ajax({
                url : "cottage/"+id,
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
                url : "{{ route('admin.booking.show_approved') }}",
                success:function (data) {
                    $("table tbody").html(data);
                    $("table").DataTable();
                }
            });
        }
    </script>
@endsection