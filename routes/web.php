<?php

use App\Livewire\Administrators\AdministratorTable;
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\Logout;
use App\Livewire\CashTransactions\CashTransactionCurrentWeekTable;
use App\Livewire\CashTransactions\FilterCashTransaction;
use App\Livewire\Dashboard;
use App\Livewire\SchoolClasses\SchoolClassTable;
use App\Livewire\SchoolMajors\SchoolMajorTable;
use App\Livewire\Students\StudentTable;
use App\Livewire\UpdateProfile;
use Illuminate\Support\Facades\Route;
use App\Livewire\PaymentCategory\PaymentCategoryTable;
use App\Http\Controllers\CashTransactionDownloadController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Homepage)
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');
Route::view('/biodata', 'biodata')->name('biodata');
Route::view('/sejarah', 'sejarah')->name('sejarah');
Route::view('/contact', 'contact')->name('contact');

Route::get('/login', Login::class)->middleware('guest')->name('login');



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', Logout::class)->name('logout');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/kelas', SchoolClassTable::class)->name('school-classes.index');
    Route::get('/jurusan', SchoolMajorTable::class)->name('school-majors.index');
    Route::get('/pengguna', AdministratorTable::class)->name('administrators.index');
    Route::get('/profil', UpdateProfile::class)->name('update-profiles.index');
    Route::get('/pelajar', StudentTable::class)->name('students.index');

    Route::get('/kas', CashTransactionCurrentWeekTable::class)->name('cash-transactions.index');
    Route::get('/kas/filter', FilterCashTransaction::class)->name('cash-transactions.filter');

    Route::get('/kas/{cashTransaction}/download', CashTransactionDownloadController::class)
        ->name('cash-transactions.download');

    // Livewire Payment Category Table
    Route::get('/payment-categories', PaymentCategoryTable::class)
        ->name('payment-categories.index');

    // Jika masih ingin halaman blade (opsional)
    Route::view('/payment-categories/page', 'pages.payment-category')
        ->name('payment-category.index');
});
