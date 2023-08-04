<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\EmbedController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TestingController;
use App\Http\Controllers\admin\TiktokController;
use App\Http\Controllers\admin\UrlController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\HomeController as UserHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', [UserHomeController::class, 'index'])->name('welcome');
    Route::get('/about', [UserHomeController::class, 'about'])->name('about');
    Route::get('/blog', [UserHomeController::class, 'blog'])->name('blog');
    Route::get('/blog/{slog}', [UserHomeController::class, 'blogDetail'])->name('blogDetail');
    Route::get('/faq', [UserHomeController::class, 'faq'])->name('faq');
    Route::get('/contact', [UserHomeController::class, 'contact'])->name('contact');
    Route::post('/kirim/message', [UserHomeController::class, 'store'])->name('contact.store');
});


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('banner', BannerController::class);
    Route::post('/banner/status', [BannerController::class, 'status'])->name('banner.status');
    Route::resource('tiktok', TiktokController::class);
    Route::post('/tiktok/status', [TiktokController::class, 'status'])->name('tiktok.status');
    Route::get('/tiktok/{id}/video', [TiktokController::class, 'video']);
    Route::resource('embed', EmbedController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('url', UrlController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('product', ProductController::class);
    Route::resource('about', AboutController::class);
    Route::get('/message', [AboutController::class, 'message'])->name('message');
    Route::resource('gallery', GalleryController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('testing', TestingController::class);
});
