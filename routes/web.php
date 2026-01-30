<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/librarian', [LibrarianController::class, 'index'])
    ->name('librarian.dashboard')
    ->middleware('auth');

Route::get('/librarian/members/create', [LibrarianController::class, 'createMember'])
    ->name('librarian.members.create')
    ->middleware('auth');

Route::get('/books/create', [BookController::class , 'create'])
    ->name('books.create')
    ->middleware('auth');

Route::get('/book', [BookController::class , 'index'])
    ->name('books.index');
    // ->middleware('auth');

Route::get('/book/{id}',[BookController::class , 'show'])
    ->name('books.show')
    ->middleware('auth');

Route::get('/my-profile' , [MemberController::class,'profile'])
    ->name('members.index')
    ->middleware('auth');

Route::get('/books/{id}/edit', [BookController::class,'edit'])
    ->name('books.edit')
    ->middleware('auth');

Route::get('/books/trash', [BookController::class,'trash'])
    ->name('books.trash')
    ->middleware('auth');

Route::get('/books/{id}/restore',[BookController::class,'restore'] )
    ->name('books.restore')
    ->middleware('auth');

Route::post('/books/store', [BookController::class , 'store'])
    ->name('books.store');

Route::post('/librarian/members', [LibrarianController::class, 'storeMember'])
    ->name('librarian.members.store')
    ->middleware('auth');

Route::post('/books/{id}/borrow' , [BookController::class , 'borrow'])
    ->name('books.borrow')
    ->middleware('auth');

Route::post('/books/{id}/return' , [BookController::class , 'returnBook'])
    ->name('books.return')
    ->middleware('auth');

Route::put('/books/{id}', [BookController::class , 'update'])
    ->name('books.update')
    ->middleware('auth');

Route::delete('/book/{id}' , [BookController::class , 'destroy'])
    ->name('books.destroy')
    ->middleware('auth');

Route::delete('/member/{id}/delete', [MemberController::class,'destroy'])
    ->name('member.destroy')
    ->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
