<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'PagesController@index')->name('index');
Route::get('about-us', 'PagesController@aboutus')->name('about_us');

Route::get('ameneties', 'PagesController@ameneties')->name('ameneties');

Route::resource('room','RoomPageController');
Route::resource('cottage','CottagePageController');
Route::resource('pool','PoolPageController');
Route::resource('book','BookPageController')->middleware('auth');
Route::resource('aboutus','AboutUsPageController');

Route::middleware(['auth','role:user'])->group(function () {
    Route::resource('profile','UserProfileController',['as' => 'user']);
});

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::resource('profile','AdminProfileController',['as' => 'admin']);

    Route::get('/','AdminDashboardController@index')->name('admin.dashboard');

    Route::resource('room','AdminRoomController',['as' => 'admin']);
    Route::get('ajax/room/showdata','AdminRoomController@showdata')->name('admin.room.showdata');

    Route::resource('cottage','AdminCottageController',['as' => 'admin']);
    Route::get('ajax/cottage/showdata','AdminCottageController@showdata')->name('admin.cottage.showdata');

    Route::resource('pool','AdminPoolController',['as' => 'admin']);
    Route::get('ajax/pool/showdata','AdminPoolController@showdata')->name('admin.pool.showdata');

    Route::resource('event','AdminEventController',['as' => 'admin']);
    Route::get('ajax/event/showdata','AdminEventController@showdata')->name('admin.event.showdata');

    Route::resource('booking','AdminBookingController',['as' => 'admin']);
    Route::get('booking/view/pending','AdminBookingController@pending')->name('admin.booking.pending');
    Route::get('ajax/booking/show_pending','AdminBookingController@show_pending')->name('admin.booking.show_pending');
    Route::get('booking/view/approved','AdminBookingController@approved')->name('admin.booking.approved');
    Route::get('ajax/booking/show_approved','AdminBookingController@show_approved')->name('admin.booking.show_approved');
    Route::post('ajax/booking/payment','AdminBookingController@payment')->name('admin.booking.payment');
});
