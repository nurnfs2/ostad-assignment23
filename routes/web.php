<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    // For Income
    Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/add-income', [IncomeController::class, 'addIncome']);
    Route::post('/income-store', [IncomeController::class, 'store'])->name('income.store');

    Route::get('/income/{income}/edit', [IncomeController::class, 'edit'])->name('income.edit');
    Route::put('/income/{income}', [IncomeController::class, 'update'])->name('income.update');
    Route::delete('/income/{income}', [IncomeController::class, 'destroy'])->name('income.destroy');


    // For Expense
    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');
    Route::get('/add-expenses', [ExpenseController::class, 'addExpenses']);
    Route::post('/expenses-store', [ExpenseController::class, 'store'])->name('expenses.store');

    Route::get('/expense/{expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::put('/expense/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/expense/{expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');

});
