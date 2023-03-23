<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Illuminate\Database\Query\JoinClause;

/* ***************************************************************
 * Routes Notes
 * ************************************************************* */
/*

    Route::resource('models', \App\Http\Controllers\ModelController::class);
    "Route::resource()" creates the following routes in the background,
    these can be considered normal laravel style for route reference

    Verb          Path                        Action  Route Name
    GET           /users                      index   users.index
    GET           /users/create               create  users.create
    POST          /users                      store   users.store
    GET           /users/{user}               show    users.show
    GET           /users/{user}/edit          edit    users.edit
    PUT|PATCH     /users/{user}               update  users.update
    DELETE        /users/{user}               destroy users.destroy


    Example of a crude debug route

    Route::get('/debug_url', function() {
        $model = \App\Models\Model::find(1);
        $user = \App\Models\User::inRandomOrder()->first();
        $model->users()->attach($user->id);
    });
*/

/* ***************************************************************
 * Casual guest users and prospective subscriber pages
 * ************************************************************* */
// Route::redirect('/', '/login');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// I use these for quick prototype development, be sure to remove or disable in production
//Route::get('/dev', function() {

    //$fullInvoices = (new \App\Service\InvoiceService())->fullInvoices('', '', 'all', 30, 0, 0);
    //dd($fullInvoices);

    //$fullInvoice = (new \App\Service\InvoiceService())->fullInvoiceById(1);
    //dd($fullInvoice);

    //$fullInvoice = (new \App\Service\InvoiceService())->fullInvoiceByNumber(10062);
    //dd($fullInvoice);

    //$invoice = \App\Models\Invoice::find(1);
    //dd($invoice);

//});

// Auth::routes(['verify' => true]); (disabled so we can customise)

// Authentication Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes... (disabled)
// Route::get('register/{plan?}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');//showRegistrationForm
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'createRegistration']);

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

/* ***************************************************************
 * Authenticated users
 * ************************************************************* */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved', 'role:admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');

    // Invoices
    Route::resource('invoices', \App\Http\Controllers\Admin\InvoiceController::class, ['except' => ['store', 'update', 'destroy']]);

    if (file_exists(app_path('Http/Controllers/Admin/PDFController.php'))) {
        Route::get('pdf/invoice/{id}', [\App\Http\Controllers\Admin\PDFController::class, 'invoice'])->name('pdf.invoice');
    }

    // Clients
    Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class, ['except' => ['store', 'update', 'destroy']]);

    // ClientContacts
    Route::resource('client-contacts', \App\Http\Controllers\Admin\ClientContactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Permissions
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', \App\Http\Controllers\Admin\AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Settings
    //Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('settings/edit/', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings/{setting}/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');


    // Team
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class, ['except' => ['store', 'update', 'destroy']]);

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [\App\Http\Controllers\Auth\UserProfileController::class, 'show'])->name('show');
    }
});

Route::group(['prefix' => 'team', 'as' => 'team.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserTeamController.php'))) {
        Route::get('/', [\App\Http\Controllers\Auth\UserTeamController::class, 'show'])->name('show');
        Route::get('{team}/accept', [\App\Http\Controllers\Auth\UserTeamController::class, 'accept'])->middleware('signed')->name('accept');
    }
});

// IMPORTANT: Remove default auth routes, we don't allow registrations
// Auth::routes();
