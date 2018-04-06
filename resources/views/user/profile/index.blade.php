@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Home Page
   ==========================================-->
        <div id="tf-home" class="text-center">
            <a href="#tf-about"></a>
        </div>

        <!-- Home Page
        ==========================================-->
        <div id="tf-home" class="text-center">
            <a href="#tf-about"></a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-body">
                        Account Management
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">My Account</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center mb-5">Booking</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th>No of rooms</th>
                                            <th>Cottage</th>
                                            <th>No of cottages</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Pax</th>
                                            <th>Price</th>
                                            <th>remarks</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->booking as $booking)
                                            <tr>
                                                <td>@isset($booking->room->room_name){{ $booking->room->room_name }}@endisset</td>
                                                <td>{{ $booking->no_of_room }} Room</td>
                                                <td>@isset($booking->cottage->cottage_name){{ $booking->cottage->cottage_name }}@endisset</td>
                                                <td>{{ $booking->no_of_cottage }} Cottage</td>
                                                <td>{{ $booking->checkin }}</td>
                                                <td>{{ $booking->checkout }}</td>
                                                <td>{{ $booking->pax }} Pax</td>
                                                <td>PHP {{ $booking->price }}.00</td>
                                                <td>{{ $booking->remarks }}</td>
                                                <td>{{ $booking->status }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">My Profile</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form id="user_form" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-center mb-5">Personal Info</h4>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    {{ csrf_field() }}
                                                    <input type="text" name="name" class="form-control" placeholder="Fullname" value="{{ $user->name }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Contact no.</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="phone" class="form-control" placeholder="Contact no." value="{{ $user->contact }}" minlength="11" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-10 col-md-offset-2">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form id="password_form" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-center mb-5">Update Password</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Enter Password</label>
                                                <div class="col-sm-10">
                                                    {{ csrf_field() }}
                                                    <input type="password" name="password" class="form-control" placeholder="New Password" id="password">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Confirm New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-10 col-md-offset-2">
                                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
            $("table").DataTable();

            $("#user_form").on('submit',function(e){
                e.preventDefault();
                var form = $(this).serializeArray();
                form.push({ name : "_method", value : "PUT"});
                form.push({ name : "key", value : "user"});
                $.ajax({
                    url : "profile/{{ Auth::user()->id }}",
                    method: "POST",
                    data:form,
                    success:function(data){
                        toastr.success(data.message.message,data.message.title);
                        $("input[name='name']").val(data.user.name);
                        $("input[name='email']").val(data.user.email);
                        $("input[name='contact_no']").val(data.user.contact_no);
                    }
                });
            });

            $("#password_form").validate({
                submitHandler: function(){
                    var form = $("#password_form").serializeArray();
                    form.push({ name : "_method", value : "PUT"});
                    form.push({ name : "key", value : "password"});
                    $.ajax({
                        url : "profile/{{ Auth::user()->id }}",
                        method: "POST",
                        data:form,
                        success:function(data){
                            toastr.success(data.message,data.title);
                        }

                    });
                },
                rules : {
                    password : {
                        required : true,
                        minlength : 6,
                        maxlength : 20,
                    },
                    password_confirmation : {
                        equalTo: '#password'
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-5" ).addClass( "has-feedback" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }

                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                }
            });
        });
    </script>
@endsection