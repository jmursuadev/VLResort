@extends('layouts.admin')
@section('content')
    <div class="modal fade" role="dialog" id="payment_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                <form id="payment_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="book_id" id="book_id">
                                    <label for="" class="control-label">Balance</label>
                                    <input type="text" name="balance" id="balance" class="form-control" placeholder="Balance" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Payment</label>
                                    <input type="text" name="payment" class="form-control" placeholder="Payment"
                                           onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="remarks" class="control-label">Remarks</label>
                                    <textarea name="remarks" id="" cols="30" rows="5" placeholder="Remarks" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Payment</button>
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
                    <h1>Booking</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Pending</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Manage Pending</strong>
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
                                    <th>Cottage</th>
                                    <th>No of cottages</th>
                                    <th>Check in</th>
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

        $("#payment_form").on('submit',function (e) {
           e.preventDefault();
           var form = $(this).serialize();
           $.ajax({
               url : "{{ route('admin.booking.payment') }}",
               method: "POST",
               data : form,
               error:function(data,json, errorThrown){
                   var errors = data.responseJSON;
                   var errors = data.responseJSON;
                   var errorsHtml= '';
                   $.each( errors.errors, function( key,value ) {
                       errorsHtml += '<li>' + value + '</li>';
                   });
                   toastr.error( errorsHtml , "Error " + data.status +': '+ errorThrown);
                   toastr.info('PLEASE REFRESH THE PAGE');
               },
               success: function (data) {
                   if(data.status == 'error'){
                       toastr.success('Please input payment not greater than the balance','ERROR!');
                   }else{
                       toastr.success('Successfully made a payment');
                       $("table").dataTable().fnDestroy();
                       showdata();
                       $("#payment_modal").modal('toggle');
                   }
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

        $(document).on('click','.payment',function () {
            var bookid = $(this).data('id');
            $.ajax({
                url : "/admin/booking/"+bookid+"/edit",
                success:function (data) {
                    $("#book_id").val(bookid);
                    $("#balance").val(data.balance);
                    $("#payment_modal").modal('toggle');
                }
            });
        });

        $('#edit_modal').on('hidden.bs.modal', function () {
            $("#img").html('');
            $("#editfile").val('');
        });

        $(document).on('click','.cancel',function () {
            var id = $(this).data('id');
            swal({
                title: 'Cancel Booking',
                input: 'textarea',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (remarks) => {
                return new Promise((resolve) => {
                    setTimeout(() => {
                if (remarks === '') {
                swal.showValidationError('Please Fill up remarks!');
            }
            resolve()
        }, 2000)
        })
        },
            allowOutsideClick: () => !swal.isLoading()
        }).then((result) => {
                if (result.value)
            {
                $.ajax({
                    url : "/admin/booking/"+id,
                    method: "POST",
                    data: {
                        "_method" : "PUT",
                        "_token" : "{{ csrf_token() }}",
                        remarks : result.value
                    },
                    success:function (data) {
                        swal(
                            'Cancelled!',
                            'Book has been cancelled.',
                            'success'
                        );
                        $("table").dataTable().fnDestroy();
                        showdata();
                    }
                });
            }
        });
        });

        // $(document).on('click','.edit',function () {
        //     var id = $(this).data('id');
        //     console.log(id);
        //     $.ajax({
        //         url : "cottage/"+$(this).data('id')+"/edit",
        //         success:function (data) {
        //             $("#cottage_id").val(id);
        //             $("#editcottage_name").val(data.cottage_name);
        //             $("#editdescription").val(data.description);
        //             $("#editguestmax").val(data.GuestMax);
        //             $("#editprice").val(data.price);
        //             $("#img").html('<img src="/storage/upload/'+data.url+'">');
        //             $("#edit_modal").modal('toggle');
        //         }
        //     });
        // });

        function showdata() {
            $.ajax({
                url : "{{ route('admin.booking.show_pending') }}",
                success:function (data) {
                    $("table tbody").html(data);
                    $("table").DataTable();
                }
            });
        }
    </script>
@endsection