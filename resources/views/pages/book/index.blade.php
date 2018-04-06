@extends('layouts.app')
@section('content')
    <div id="header" style="background-image: url('/images/3.jpg'); background-repeat: no-repeat; background-size: cover; padding-bottom: 50px; position: relative;">
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-12" style="float:right;" id="text-reservation">
                    <div class="about-text">
                        <div class="section-title">

                            <h3 class="color-white">Villa Leonora Resort and Events Venue</h3>

                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">We have a total of 2 pools, event halls, cottages and rooms that is available for rent for all kinds of occasions. Clean pools and budget friendly  </p>
                        <ul class="about-list">
                            <li class="color-white">
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Rooms</strong> - <em> are fitted with Air-conditioning </em>,
                                <em>2 beds</em>,
                                <em>Internet(WIFI and wire connection) </em>,
                                <em>Digital safe </em>,
                                <em>LCD flat screen</em>,
                                <em>Clean comfort rooms</em>.

                            </li>
                            <li class="color-white">
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Adult pool</strong> - <em>We have a pool in height of 4ft to 7 ft for adults </em>
                            </li>
                            <li class="color-white">
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Kiddie pool</strong> - <em>1ft to 3 ft for kids</em>
                            </li>

                            <li class="color-white">
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Contact</strong> - <em>1234567890 or 0987654321</em>
                            </li>
                            <li class="color-white" style="margin-bottom: 10px;">
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Address</strong> - <em>Igay Road Sto. Cristo San Jose Del Monte Bulacan, (Near Petron) </em>
                            </li>
                            <button type="submit" class="btn tf-btn btn-success"> <a href="{{ route('book.index') }}"><font color="yellow">Make Reservation now</font></a></button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="booking" style="width: 100%;">
            <div class="container-fluid">
                <div class="row">
                    <form id="book_form">
                        <div class="col-md-4 col-sm-6" style="padding-top: 10px;">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <select name="room" id="room" class="form-control" autofocus>
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $r)
                                        <option value="{{ $r->id }}">{{ $r->room_name }} (Max of {{ $r->GuestMax }} Person) (PHP {{ $r->price }}/DAY)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6" style="padding-top: 10px;">
                            <div class="form-group">
                                <select name="no_of_room" id="no_of_room" class="form-control">
                                    <option value="">No of rooms</option>
                                    @foreach(range(1,10) as $i)
                                        <option value="{{ $i }}">{{ $i }} Rooms</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6" style="padding-top: 10px;">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <select name="cottage" id="cottage" class="form-control">
                                    <option value="">Select Cottages</option>
                                    @foreach($cottages as $c)
                                        <option value="{{ $c->id }}">{{ $c->cottage_name }}(Max of {{ $c->GuestMax }} Person) (PHP {{ $c->price}} per 8am-6pm or 5pm-5am)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6" style="padding-top: 10px;">
                            <div class="form-group">
                                <select name="no_of_cottage" id="no_of_cottage" class="form-control">
                                    <option value="">No of Cottages</option>
                                    @foreach(range(1,5) as $i)
                                        <option value="{{ $i }}">{{ $i }} Cottages</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-5" style="padding-top: 10px;">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="checkin" id="checkin" placeholder="Check In">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-5" style="padding-top: 10px;">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="checkout" id="checkout" placeholder="Check Out" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-2" style="padding-top: 10px;">
                            <div class="form-group">
                                <input type="text" name="pax" id="pax" class="form-control" placeholder="Pax"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12" style="padding-top: 10px;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block">BOOK NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            function setDimensions(){
                var footerHeight = $("#footer").height();
                var windowsHeight = $(document).height()-footerHeight-35;
                var booking = $(".booking").height();
                $('#header').css('min-height', windowsHeight+'px');
                $("#text-reservation").css('margin-bottom',booking+'px').addAttr
            }

            //when resizing the site, we adjust the heights of the sections
            $(window).resize(function() {
                setDimensions();
            });

            setDimensions();

            var minDate = new Date();
            minDate.setDate(minDate.getDate());
            $("#checkin").datepicker({
                startDate : minDate,
                autoclose : true,
                todayHighlight : true,
                format: "yyyy-mm-dd",
            }).on('changeDate',function(selected){
                var room = $("#room").val();
                if(room !== "") {
                    $("#checkout").removeAttr('disabled');
                    var minDate = new Date(selected.date.valueOf());
                    minDate.setDate(minDate.getDate() + 1);
                    $("#checkout").datepicker('setStartDate', minDate);
                    $("#checkout").val("");
                }
            });

            $(document).on('change','#room',function () {
               var room = $(this).val();
               if(room === "" || room === null){
                   $("#checkin").val("");
                   $("#checkout").val("").prop('disabled',true);
               }else{
                   $("#checkin").val("");
               }
            });

            $("#checkout").datepicker({
                startDate : minDate,
                autoclose : true,
                todayHighlight : true,
                format: "yyyy-mm-dd"
            });
        });

        $("#book_form").on('submit',function (e) {
           e.preventDefault();
           var form = $(this).serialize();
           $.ajax({
               url : "{{ route('book.store') }}",
               method : "POST",
               data : form,
               error:function(data,json, errorThrown){
                   var errors = data.responseJSON;
                   var errors = data.responseJSON;
                   var errorsHtml= '';
                   $.each( errors.errors, function( key,value ) {
                       errorsHtml += '<li>' + value + '</li>';
                   });
                   toastr.error( errorsHtml , "Error " + data.status +': '+ errorThrown)
               },
               success: function (data) {
                   swal(
                       'Thank you!',
                       'Your book has been submit.',
                       'success'
                   );
                   document.getElementById("book_form").reset();
               }
           });
        });

    </script>
@endsection