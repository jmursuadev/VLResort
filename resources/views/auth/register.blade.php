@extends('layouts.app')

@section('content')
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

                            <h3 style="color: white;">Welcome to Villa Leonora Resort and Event Venue</h3>

                            <div class="clearfix"></div>
                        </div>
                        <p class="intro"><font color="white">A place to relax enjoyable for everyone. Comfortable and pleasing that will make you satisfied. We provide the best serenity of peace of mind with comfortability stature, Villa Leanora Resort and Event Venue is also a place for differents occasions like Birthdays, Debuts, Weddings,
                                Receptions, Team Buildings and other Recreational activities, Villa Leanora Resort and Event Venue is your one stop place. you can
                                experience all of this at the resort.</font></p>
                        <ul class="about-list">
                            <li style="color: white;">
                                <em>Come and visit Villa Leonora Resort and Event Ve</em>
                            </li>
                            <br>
                            <button type="submit" class="btn tf-btn btn-success"> <a href="{{ route('book.index') }}"><font color="yellow">Make Reservation now</font></a></button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="logo-register">
                    <img src="{{ asset('images1/card.jpg') }}" alt="LOGO" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="section-title">
                    <h3>REGISTER</h3>

                    <div class="clearfix"></div>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" style="color:#333;">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>

                            <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required="required" autofocus="autofocus">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contact" class="control-label">Contact</label>
                            <input id="contact" type="text" placeholder="Contact No." class="form-control" name="contact" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>


                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>

                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
