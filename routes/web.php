<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('login');
    } else {
        return redirect()->route('dashboard');
    }
});

Route::get('/dashboard/profile', 'ProfileController@show')->name('profile.show');
Route::get('/dashboard/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/dashboard/profile/edit/avatar', 'ProfileController@update_avatar')->name('profile.edit_avatar');
Route::post('/dashboard/profile/delete/avatar', 'ProfileController@destroy_avatar')->name('profile.delete_avatar');
Route::post('/dashboard/profile/edit/password', 'ProfileController@update_password')->name('profile.edit_password');
Route::post('/dashboard/profile/edit/info', 'ProfileController@update_info')->name('profile.edit_info');
Route::post('/dashboard/profile/edit/profile', 'ProfileController@update_profile')->name('profile.edit_profile');

Route::get('/dashboard/webinars', 'WebinarsController@list')->name('webinar.list');
Route::post('/dashboard/webinars/{webinar}/register', 'WebinarsController@register')->name('webinar.register');
Route::post('/dashboard/webinars/{webinar}/unregister', 'WebinarsController@unregister')->name('webinar.unregister');

Route::get('/admin/webinars/create', 'WebinarsController@create')->name('admin.webinar.create');
Route::post('/admin/webinars/store', 'WebinarsController@store')->name('admin.webinar.store');
Route::get('/admin/webinars/manage', 'WebinarsController@manage')->name('admin.webinar.manage');
Route::get('/admin/webinars/manage/{webinar}/edit', 'WebinarsController@edit')->name('admin.webinar.edit');
Route::post('/admin/webinars/manage/{webinar}/delete', 'WebinarsController@destroy')->name('admin.webinar.destroy');
Route::get('/admin/webinars/manage/{webinar}/users', 'WebinarsController@edit')->name('admin.webinar.users');
Route::post('/admin/webinars/manage/{webinar}/update', 'WebinarsController@update')->name('admin.webinar.update');
Route::get('/admin/webinars/manage/{webinar}/registration/users', 'WebinarRegistrationController@userShow')->name('admin.webinar.registration.users');
Route::post('/admin/webinars/manage/{webinar}/registration/users/unregister', 'WebinarRegistrationController@userUnregister')->name('admin.webinar.registration.users.unregister');
Route::get('/admin/webinars/manage/{webinar}/registration/email', 'WebinarRegistrationController@emailShow')->name('admin.webinar.registration.email');
Route::get('/admin/webinars/manage/{webinar}/registration/email/preview', 'WebinarRegistrationController@emailPreview')->name('admin.webinar.registration.email.preview');
Route::post('/admin/webinars/manage/{webinar}/registration/email/send', 'WebinarRegistrationController@emailSend')->name('admin.webinar.registration.email.send');

Route::get('/admin', 'AdminController@home')->name('admin.home');

Auth::routes(['verify' => true]);

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs')->middleware(['auth', 'isAdmin']);
Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('verified');
