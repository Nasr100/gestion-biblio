<?php
use App\Models\Book;

use App\Models\Rental;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
// Route::get('/mail',[MailController::class,'index'])->name('membersMail');



Route::get('/',[AuthController::class,'getLoginView'])->name('auth.view')->middleware('alreadyLoggedIn');
Route::post('/auth',[AuthController::class,'auth'])->name('auth.handle');

Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/logOut',[AuthController::class,'logOut'])->name('auth.logout');


    Route::get('/members',[MemberController::class,'getMembersView'])->name('member.view');
    Route::post('/member-store',[MemberController::class,'storeMember'])->name('member.store');
    Route::post('/member-delete',[MemberController::class,'deleteMember'])->name('member.delete');
    Route::post('/member-update',[MemberController::class,'updateMember'])->name('member.update');
    Route::post('/member-search',[MemberController::class,'searchMember'])->name('member.search');
    Route::post('/member-bookStatus',[MemberController::class,'bookStatus'])->name('member.bookStatus');
    Route::get('/pagination',[memberController::class,'pagination']);

    Route::get('/books',[BookController::class,'getBooksView'])->name('book.view');
    Route::post('/book-store',[BookController::class,'storeBook'])->name('book.store');
    Route::post('/book-update',[BookController::class,'updateBook'])->name('book.update');
    Route::post('/book-delete',[BookController::class,'deleteBook'])->name('book.delete');
    Route::post('/book-search',[BookController::class,'searchBook'])->name('book.search');
    Route::post('/category-search',[BookController::class,'searchCategory'])->name('category.search');
    Route::get('/books/pagination',[memberController::class,'pagination']);

    Route::get('/categories',[CategoryController::class,'getCategoriesView'])->name('category.view');
    Route::post('/category-store',[CategoryController::class,'storeCategory'])->name('category.store');
    Route::post('/category-update',[CategoryController::class,'updateCategory'])->name('category.update');
    Route::post('/category-delete',[CategoryController::class,'deleteCategory'])->name('category.delete');

    Route::get('/rentals',[RentalController::class,'getRentalsView'])->name('rental.view');
    Route::post('/rental-store',[RentalController::class,'storerental'])->name('rental.store');
    Route::post('/rental-update',[RentalController::class,'rentalUpdate'])->name('rental.update');
    Route::post('/rental-search',[RentalController::class,'rentalSearch'])->name('rental.search');
    Route::post('/rental-delete',[RentalController::class,'rentalDelete'])->name('rental.delete');
    Route::post('/rental-member-search',[RentalController::class,'memberSearch'])->name('rental.search.member');
    Route::post('/rental-book-search',[RentalController::class,'bookSearch'])->name('rental.search.book');

    Route::middleware(['RoleMiddleware'])->group(function () {
        Route::get('/staff',[StaffController::class,'getStaffView'])->name('staff.view');
        Route::post('/staff-store',[StaffController::class,'storeStaff'])->name('staff.store');
        Route::post('/staff-delete',[StaffController::class,'deleteStaff'])->name('staff.delete');
        Route::post('/staff-update',[StaffController::class,'updateStaff'])->name('staff.update');
        Route::post('/staff-search',[StaffController::class,'searchStaff'])->name('staff.search');
        Route::get('/staff/pagination',[StaffController::class,'pagination']);
    });

    Route::get('/Dashboard',[DashboardController::class,'getBoardView'])->name('Board.view');
    Route::get('/Dashboard-numbers',[DashboardController::class,'getNumbers'])->name('Board.numbers');
    Route::get('/Dashboard-most-rented-members',[DashboardController::class,'getMrentedMembers'])->name('Board.most.members');
    Route::get('/Dashboard-most-rented-books',[DashboardController::class,'getMrentedBooks'])->name('Board.most.books');

   
});





