@extends('layouts.app')
@section('content')
    <!-- About Us Page
    ==========================================-->
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
    <section class="why-choose-us" style="position:relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center choose-us-title">
                    <h1>why choose us?</h1>
                </div>
            </div>

            <div class="row">
                <div class="choose-us-des">
                    <div class="col-md-4  choose-us-item text-center wow slideInLeft" data-wow-duration="2s">
                        <div><i class="fa fa-plane"></i></div>
                        <h3>Great Services offered</h3>
                        <p>Villa Leonora resorts and event venue offers a lot. Team buildings, special occasion and a vacation that truly satisfy your vacation.</p>
                    </div>

                    <div class="col-md-4  choose-us-item text-center wow fadeIn" data-wow-duration="2s">
                        <div class="star"><i class="fa fa-star"></i></div>
                        <h3>Hassle free</h3>
                        <p>With our extensive Hotel experience, we will work to make your planning and travel as care-free as possible giving you more enjoyment at your destination.</p>

                    </div>

                    <div class="col-md-4  choose-us-item text-center wow slideInRight" data-wow-duration="2s">
                        <div class="key"><i class="fa fa-key"></i></div>
                        <h3>Personal Touch</h3>
                        <p class="">Hotel arrangements are designed to give you a tailored logged experience based on your interests and dreams.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="room">
        <div class="room-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="room-inner-content">
                            <h1>Ameneties</h1>
                            <h4> Wider choices to visit and enjoy your holidays!</h4>
                            <p>Villa leonora resort and event venue amenities consist of 3 different pools and cottages, a room hotel for staycation, and an ambience of a provincial vacation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="call-us text-center">
        <h2>
            Call us <br><br>
            0995-816-2868
        </h2>
    </section>
@endsection