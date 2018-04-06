@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Profile Management</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">My Profile</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">My Profile</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg">
                                            <h4 class="text-center mb-5">Personal Info</h4>
                                            <hr>
                                            <form id="user_form">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        {{ csrf_field() }}
                                                        <input type="text" name="name" class="form-control" placeholder="Fullname" value="{{ $user->name }}">

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Contact no.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="phone" class="form-control" placeholder="Contact no." value="{{ $user->contact }}" minlength="11" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg">
                                            <h4 class="text-center mb-5">Update Password</h4>
                                            <hr>
                                            <form id="password_form">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Enter New Password</label>
                                                    <div class="col-sm-8">
                                                        {{ csrf_field() }}
                                                        <input type="password" name="password" class="form-control" placeholder="New Password" id="password">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Confirm New Password</label>
                                                    <div class="col-sm-8">
                                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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