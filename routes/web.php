<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomCreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RazorpayController;


//
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/room_details', [HomeController::class, 'room_details'])->name('room_details');
Route::get('/our_room', [HomeController::class, 'our_room'])->name('our_room');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/about', [HomeController::class, 'about'])->name('about');
// Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::view ('/contact', 'contact');
//account login
Route::group(['prefix' => 'account'],function(){
    Route::group(['middleware' => 'guest'],function() {
        Route::get('login',[LoginController::class, 'index'])->name('account.login');
        Route::get('register',[LoginController::class, 'register'])->name('account.register');
        Route::post('process-register',[LoginController::class, 'processregister'])->name('account.processregister');
        Route::post('authenticate',[LoginController::class, 'authenticate'])->name('account.authenticate');

    });
    Route::group(['middleware' => 'auth'],function() {
        Route::get('logout',[LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class, 'index'])->name('account.dashboard');
    });
});
//admin login 
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
//room
Route::get('/room_create', [RoomCreateController::class, 'room_create']);
Route::post('/add_room', [RoomCreateController::class, 'add_room']);
Route::get('/view_room', [RoomCreateController::class, 'view_room']);
Route::get('/room_update/{id}', [RoomCreateController::class, 'room_update']);
Route::put('/edit_room/{id}', [RoomCreateController::class, 'edit_room']);
Route::delete('/rooms/{room}', [RoomCreateController::class, 'destroy'])->name('rooms.destroy');

//view_gallery
Route::get('/view_gallary', [GalleryController::class, 'view_gallary']);
Route::post('/upload_gallary', [GalleryController::class, 'upload_gallary']);
Route::get('/delete_gallary/{id}', [GalleryController::class, 'delete_gallary']);


Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/all_messages', [GalleryController::class, 'all_messages']);
Route::get('/send_mail/{id}', [GalleryController::class, 'send_mail']);
Route::post('/mail/{id}', [GalleryController::class, 'mail']);

//logo 
Route::get('admin/logo', [LogoController::class, 'admin_logo'])->name('admin.logo');
Route::get('admin/Setting', [LogoController::class, 'index'])->name('admin.setting');
// Handle logo upload (POST)
Route::post('admin/logo/post', [LogoController::class, 'admin_logo_post'])->name('admin.logo.post');
Route::get('/bookings', [LoginController::class, 'bookings']);
Route::delete('/delete_booking/{id}', [LoginController::class, 'destroy'])->name('booking.destroy');


 
 
Route::get('/admin/colors', [ThemeController::class, 'index'])->name('admin.colors.index');
// Custom POST route to update first record
Route::put('/color-update', [ThemeController::class, 'updateFirst'])->name('theme-update');

Route::get('/search-rooms', [HotelController::class, 'search'])->name('search.rooms');

Route::get('/bookings', [BookingController::class, 'bookings']);
Route::delete('/delete_booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');


Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
Route::get('/bookings', [BookingController::class, 'bookings']);
Route::delete('/delete_booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

Route::get('/approve-book/{id}', [BookingController::class, 'approve_book'])->name('approve.book');
Route::get('/reject-booking/{id}', [BookingController::class, 'reject_book'])->name('reject.book');

Route::get('admin/Setting', [SettingController::class, 'index'])->name('admin.setting');

Route::get('user/setting',[dashboardController::class,'setting']);
Route::get('user/dashboard/',[dashboardController::class,'user.dashboard']);

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// List all products (bookings)
Route::get('/products', [RamController::class, 'index'])->name('products.index');

// Show form to create a booking/product
Route::get('/products/create', [RamController::class, 'create'])->name('products.create');

// Handle form submission
Route::post('/products', [RamController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [RamController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [RamController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [RamController::class, 'destroy'])->name('products.destroy');

Route::get('/book/{id}', [HomeController::class, 'book'])->name('book');
Route::get('/check-availability', [App\Http\Controllers\BookingController::class, 'checkAvailability']);
Route::post('/add_booking/{room}', [App\Http\Controllers\BookingController::class, 'addBooking']);
Route::get('/payment-methods', [BookingtController::class, 'showPaymentMethods']);


// Frontend route
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// Admin routes
Route::get('/admin/blog', [BlogController::class, 'show'])->name('admin.blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('admin.blog.store');
Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');


Route::get('/slides', [SlideController::class, 'adminIndex'])->name('admin.slides.index');
Route::get('/slides/create', [SlideController::class, 'create'])->name('admin.slides.create');
Route::post('/slides', [SlideController::class, 'store'])->name('admin.slides.store');
Route::delete('slides/{slide}', [SlideController::class, 'destroy'])->name('slides.destroy');



Route::get('/dashboard', [BookingController::class, 'showBookings'])->name('dashboard');
Route::get('/booking/details/{id}', [BookingController::class, 'showBookingDetails'])->name('booking.details');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');



Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.index');
    Route::post('/about-us', [AboutUsController::class, 'update'])->name('about.update');

    Route::post('/contact', [HomeController::class, 'contact'])->name('contact');



    

//RazorpaytController;
// routes/web.php
Route::get('/razorpay', [RazorpayController::class, 'index']);
Route::post('/razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');

Route::post('/initiate-razorpay', [BookingController::class, 'initiatePayment'])->name('initiate.razorpay');
Route::post('/confirm-booking', [BookingController::class, 'confirmBooking'])->name('confirm.booking');


Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');