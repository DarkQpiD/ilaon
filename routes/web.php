<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\YourController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewBookController;
use App\Http\Controllers\ReturnHistoryController;
use App\Http\Livewire\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Admin
//Route::get('/home',[AdminController::class,'index']);
//Route::get('/home', [AdminController::class, 'index'])->name('home');
//Route::get('/home', 'AdminController@index')->name('home');
route::get('/home',[AdminController::class,'index']);
route::get('/admin',[DataController::class,'index']);
// Route to display the form for adding data
Route::get('/data/create', [DataController::class, 'create'])->name('data.create');

// Route to store a new book
Route::post('/data/store-book', [DataController::class, 'storeBook'])->name('data.storeBook');

// Route to store a new user
Route::post('/data/store-user', [DataController::class, 'storeUser'])->name('data.storeUser');

//book
Route::resource('book', App\Http\Controllers\BookController::class)->middleware('auth:sanctum')->names('book');


//loan
//Route::middleware(['auth'])->group(function () {
    //Route::post('/loan/borrow/{book_id}', [LoanController::class, 'borrow'])->name('loan.borrow');
    //Route::post('/loan/return/{loan_id}', [LoanController::class, 'return'])->name('loan.return');
//});
//Route::resource('loan', App\Http\Controllers\LoanController::class)->middleware('auth:sanctum')->names('loan');

//LoanController
Route::get('/borrow/{book_id}', [LoanController::class, 'borrow'])->name('borrow.book');
Route::get('/return/{loan_id}', [LoanController::class, 'return'])->name('return.book');
Route::post('/loan/borrow/{book_id}', [LoanController::class, 'borrow'])->name('loan.borrow');


Route::group(['middleware' => 'auth'], function () {
    // สำหรับการยืมหนังสือ
    Route::post('/loan/borrow/{book_id}', [LoanController::class, 'borrow'])->name('loan.borrow');
    
    // สำหรับการคืนหนังสือ
    Route::post('/loan/return/{loan_id}', [LoanController::class, 'return'])->name('loan.return');
    
    // หน้าที่แสดงรายการหนังสือที่ถูกยืม
    Route::get('/loan/borrowed', [LoanController::class, 'borrowedBooks'])->name('loan.borrowedBooks');
    
    // หน้า Borrow ที่เปล่า (โดยไม่มีหนังสือถูกยืม)
    Route::get('/loan/borrow', [LoanController::class, 'emptyBorrow'])->name('loan.emptyBorrow');
});
Route::post('/confirm-borrow/{loan_id}', [LoanController::class, 'confirmBorrow'])
    ->name('confirm.borrow');
    
Route::post('/add-to-cart/{book_id}', [CartController::class, 'addToCart'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'viewCart'])
    ->name('cart.view');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::prefix('cart')->middleware(['auth'])->group(function () {
        Route::get('/', [CartController::class, 'viewCart'])->name('cart.view');
        Route::post('/add/{book_id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
        // เพิ่ม route อื่น ๆ ตามที่คุณต้องการ
    });

    Route::post('/cart/confirm-borrow/{loan_id}', [CartController::class, 'confirmBorrow'])->name('cart.confirmBorrow');
    Route::post('/cart/cancel-borrow/{loan_id}', [CartController::class, 'cancelBorrow'])->name('cart.cancelBorrow');
    Route::post('/cart/confirm-borrow/{loan_id}', 'CartController@confirmBorrow')->name('cart.confirmBorrow');
// ตัวอย่าง Route สำหรับเรียกใช้ CartController
Route::group(['prefix' => 'cart'], function () {
    // โค้ดที่เรียกใช้ CartController
    Route::get('/', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/add-to-cart/{book_id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::post('/confirm-borrow/{loan_id}', [CartController::class, 'confirmBorrow'])->name('cart.confirmBorrow');
    Route::post('/cancel-borrow/{loan_id}', [CartController::class, 'cancelBorrow'])->name('cart.cancelBorrow');
});

Route::middleware(['admin'])->group(function () {
    // เพิ่ม routes ของคุณที่ต้องการให้มี Middleware 'admin' ตรวจสอบ

    // เช่น ตัวอย่าง routes ที่เรียก Controller AdminController@index
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/add-book', [AdminController::class, 'addBook'])->name('admin.addBook');
    Route::get('/admin/dashboard/return', [AdminController::class, 'return'])->name('admin.retrun');
    // เพิ่ม routes อื่น ๆ ตามต้องการ
});

//review
//Route::resource('review', App\Http\Controllers\ReviewBookController::class)->middleware('auth:sanctum')->names('review');
Route::post('/reviews/{book_id}', 'App\Http\Controllers\ReviewBookController@store')->name('reviews.store');
Route::get('/reviews/{book_id}', 'App\Http\Controllers\ReviewBookController@store')->name('reviews.show');

//return
Route::post('/return-book/{borrow_id}', [ReturnHistoryController::class, 'returnBook'])->name('return.book');