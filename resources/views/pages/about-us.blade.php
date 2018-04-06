@extends('layouts.app')
@section('content')
    <div id="tf-home" class="text-center">
        <a href="#tf-about"></a>
    </div>

    <section class="contact-us-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-us-title">
                        <h2 style="margin-bottom: 20px;">CONTACT US</h2>
                        <p>Our Customer support team are open to assist you from Monday to Saturday from<strong> 9am to 7pm. </strong>We will do our best to ensure that each and every inquiry or concerns gets our undivided attention. We are always here to help and assist you. </p>
                    </div>
                    <div class="col-md-12">
                        <article class="contact-us">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><i class="fa fa-home"></i>Address</h4>
                                    Igay Road Sto. Cristo San Jose Del Monte Bulacan, (Near Petron)
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h4><i class="fa fa-phone"></i>Call or text us at</h4>
                                    Globe &nbsp   +63 995 816 2868<br>
                                    Smart &nbsp   +63 921 573 5836<br>
                                    Sun  &nbsp &nbsp &nbsp +63 933 522 0708<br>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h4><i class="fa fa-envelope"></i>Email Address</h4>
                                    reservations@villaleonora.com <br>
                                    marketing@villaleonora.com
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="map-email">
        <div class="row">
            <div class="container">
                <hr>
                <div class="col-md-6">
                    <div class="contact-us-email">
                        <h2 class="text-center"><i class="fa fa-envelope"></i> Email Us </h2>
                        <p class="text-center">We are happy to answer you questions regarding quotation or related concern about our company </p>
                        <form id="email">
                            <div class="col-md-12">
                                <div class="form-group">

                                    {{ csrf_field() }}
                                    <input type="email" name="senderemail" class="form-control" id="senderemail" placeholder="Enter Email Address" value="@isset(Auth::user()->email){{ Auth::user()->email }}@endisset">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" name="sendername" id="sendername" class="form-control" placeholder="Enter full name" value="@isset(Auth::user()->name){{ Auth::user()->name }}@endisset">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="sendersubject" placeholder="Enter Subject" name="sendersubject" value="">
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">

                                    <textarea class="form-control" id="sendercontent" name="sendercontent" rows="8" placeholder="Enter inquiry here"></textarea>
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">

                                    <input type="submit" class="form-control btn btn-info text-center">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="locate-us">
                        <h2 class="text-center"> <i class="fa fa-map"></i> Locate Us</h2>
                        <h5>Igay Road Sto. Cristo San Jose Del Monte Bulacan, (Near Petron)</h5>
                        <img src="{{ asset('images1/map.jpg') }}" style="width: 100%;">
                    </div>
                </div>
            </div>
    </section>
    <section class="aboutus-services" id="aboutus">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="aboutus-title text-center">
                        <h2>ABOUT US</h2>
                        <br>
                        <h4>VILLA LEONORA RESORT AND EVENT VENUE</h4>
                        <p>Villa Leonora Resort and Event Venue is a family business owned by the Fernando family started April 2017, located at Lot 5, Igay Road, Sto. Cristo 3023, San Jose Del Monte Bulacan,</p>
                    </div>

                    <h2 class="text-center" style="margin-bottom: 15px;"> VILLA LEONORA RESORT SERVICES OFFERED </h2>
                    <p class="text-center">We are happy to deliver top of the line hotel experience and services.Try our exciting promos and services</p>
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-duration="2s">
                            <div class="aboutus-services-list text-center">
                                <div class="aboutus-services-item">
                                    <i class="fa fa-hotel"></i>
                                    <h4>Room Packages</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-duration="2s">
                            <div class="aboutus-services-list text-center">
                                <div class="aboutus-services-item">
                                    <i class="fa fa-ticket"></i>
                                    <h4>Food Services</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-duration="2s">
                            <div class="aboutus-services-list text-center">
                                <div class="aboutus-services-item">
                                    <i class="fa fa-road"></i>
                                    <h4>Event Management</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-duration="2s">
                            <div class="aboutus-services-list text-center">
                                <div class="aboutus-services-item">
                                    <i class="fa fa-star"></i>
                                    <h4>Pool Services</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-duration="2s">
                            <div class="aboutus-services-list text-center">
                                <div class="aboutus-services-item">
                                    <i class="fa fa-bookmark-o"></i>
                                    <h4>Catering</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-duration="2s">
                            <div class="aboutus-services-list text-center">
                                <div class="aboutus-services-item">
                                    <i class="fa fa-star"></i>
                                    <h4>Party</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div style="background-image: url('/images1/1.jpeg'); background-repeat: no-repeat; background-size: cover; padding-bottom: 50px;">
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
                <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 50px;">
                    <div id="slideshow-wrap">
                        <input type="radio" id="button-1" name="controls" checked="checked"/>
                        <label for="button-1"></label>
                        <input type="radio" id="button-2" name="controls"/>
                        <label for="button-2"></label>
                        <input type="radio" id="button-3" name="controls"/>
                        <label for="button-3"></label>
                        <input type="radio" id="button-4" name="controls"/>
                        <label for="button-4"></label>
                        <input type="radio" id="button-5" name="controls"/>
                        <label for="button-5"></label>
                        <div id="slideshow-inner">
                            <ul>
                                <li id="slide1">
                                    <img src="images1/1.jpeg" width="533px"/>
                                    <div class="description">
                                        <input type="checkbox" id="show-description-1"/>
                                        <label for="show-description-1" class="show-description-label">I</label>
                                        <div class="description-text">
                                            <h2> So clean</h2>
                                            <p>We provide the best</p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide2">
                                    <img src="images1/6.jpeg" width="530px"/>
                                    <div class="description">
                                        <input type="checkbox" id="show-description-2"/>
                                        <label for="show-description-2" class="show-description-label">1</label>
                                        <div class="description-text">
                                            <h2>Event Venue</h2>
                                            <p>These are rooms design to suite your high class confortability . </p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide3">
                                    <img src="images/3.jpg" />
                                    <div class="description">
                                        <input type="checkbox" id="show-description-3"/>
                                        <label for="show-description-3" class="show-description-label">2</label>
                                        <div class="description-text">
                                            <h2>Text</h2>
                                            <p>   </p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide4">
                                    <img src="images/4.jpg" />
                                    <div class="description">
                                        <input type="checkbox" id="show-description-4"/>
                                        <label for="show-description-4" class="show-description-label">3</label>
                                        <div class="description-text">
                                            <h2>Mwanainchi Rooms</h2>
                                            <p>We have rooms to suite your pocket with lots of enjoyment</p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide5">
                                    <img src="images/5.jpg" />
                                    <div class="description">
                                        <input type="checkbox" id="show-description-5"/>
                                        <label for="show-description-5" class="show-description-label">4</label>
                                        <div class="description-text">
                                            <h2>Deluxe Rooms!</h2>
                                            <p>We design our room to meet international and Pan-African style for our customer.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">
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
                            <li class="color-white">
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Address</strong> - <em>Igay Road Sto. Cristo San Jose Del Monte Bulacan, (Near Petron) </em>
                            </li>
                            <button type="submit" class="btn tf-btn btn-success"> <a href="{{ route('book.index') }}"><font color="yellow">Make Reservation now</font></a></button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#email").on('submit',function (e) {
            e.preventDefault();
            $.ajax({
                url : "{{ route('aboutus.store') }}",
                method : "POST",
                data : $(this).serialize(),
                error:function(data,json, errorThrown){
                    var errors = data.responseJSON;
                    var errors = data.responseJSON;
                    var errorsHtml= '';
                    $.each( errors.errors, function( key,value ) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    toastr.error( errorsHtml , "Error " + data.status +': '+ errorThrown);
                    swal.close();
                },
                beforeSend:function (data) {
                    swal({
                        title : '!',
                        text : 'Sending Mail',
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
                    $("#sendercontent").val("");
                    $("#sendersubject").val("");
                }
            });
        });
    </script>
@endsection