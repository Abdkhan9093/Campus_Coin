<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('user.home') : redirect()->route('login');
});

Route::middleware(['auth', 'active.user'])->group(function () {
    Route::get('/user', [UserController::class, 'home'])->name('user.home');

    Route::get('/income', [UserController::class, 'income'])->name('income');
    Route::post('/income', [UserController::class, 'saveIncome'])->name('income.store');
    Route::get('/income/{income}/edit', [UserController::class, 'editIncome'])->name('income.edit');
    Route::put('/income/{income}', [UserController::class, 'updateIncome'])->name('income.update');
    Route::delete('/income/{income}', [UserController::class, 'deleteIncome'])->name('income.delete');

    Route::get('/expenses', function () { return view('userexpenses'); })->name('expenses');
    Route::post('/expenses', [UserController::class, 'storeExpense'])->name('expenses.store');
    Route::get('/expenses/{expense}/edit', [UserController::class, 'editExpense'])->name('expenses.edit');
    Route::put('/expenses/{expense}', [UserController::class, 'updateExpense'])->name('expenses.update');
    Route::delete('/expenses/{expense}', [UserController::class, 'deleteExpense'])->name('expenses.delete');

    Route::get('/history', [UserController::class, 'history'])->name('history');
    Route::get('/reports', [UserController::class, 'reports'])->name('reports');
    Route::get('/reports/print', [UserController::class, 'reportPrint'])->name('reports.print');

    Route::get('/budgets', [UserController::class, 'budgets'])->name('budgets');
    Route::get('/budget', [UserController::class, 'budgets'])->name('budget.old');
    Route::post('/budget', [UserController::class, 'saveBudget'])->name('budgets.save');
    Route::post('/budgets/category', [UserController::class, 'saveCategoryBudget'])->name('budgets.category');

    Route::get('/categories', [UserController::class, 'categories'])->name('categories');
    Route::post('/categories', [UserController::class, 'addCategory'])->name('categories.store');
    Route::delete('/categories/{category}', [UserController::class, 'deleteCategory'])->name('categories.delete');

    Route::get('/saved-tips', [UserController::class, 'savedTips'])->name('saved.tips');
    Route::post('/saved-tips', [UserController::class, 'saveTip'])->name('saved.tips.store');
    Route::delete('/saved-tips/{tip}', [UserController::class, 'deleteSavedTip'])->name('saved.tips.delete');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile.simple');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update.simple');

    Route::get('/contact', function () { return view('usercontact'); })->name('contact');
    Route::get('/dashboard', function () { return redirect()->route('user.home'); })->name('dashboard');
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.login.submit');

Route::middleware('admin.auth')->prefix('admin')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::patch('/users/{user}/status', [AdminController::class, 'updateUserStatus'])->name('admin.users.status');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/expenses', [AdminController::class, 'expenses'])->name('admin.expenses');
    Route::get('/activity', [AdminController::class, 'activity'])->name('admin.activity');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});

Route::get('/A/user', function () { return redirect()->route('admin.users'); });
Route::get('/A/expenses', function () { return redirect()->route('admin.expenses'); });
Route::get('/A/activity', function () { return redirect()->route('admin.activity'); });
Route::get('/A/settings', function () { return redirect()->route('admin.settings'); });
