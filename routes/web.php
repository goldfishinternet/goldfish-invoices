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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

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

    // Team
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Alert
    Route::get('user-alerts/seen', [\App\Http\Controllers\Admin\UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', \App\Http\Controllers\Admin\UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [\App\Http\Controllers\Admin\MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [\App\Http\Controllers\Admin\MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [\App\Http\Controllers\Admin\MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [\App\Http\Controllers\Admin\MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');

    // Product Category
    //Route::post('product-categories/media', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'storeMedia'])->name('product-categories.storeMedia');
    //Route::resource('product-categories', \App\Http\Controllers\Admin\ProductCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Tag
    //Route::resource('product-tags', \App\Http\Controllers\Admin\ProductTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product
    //Route::post('products/media', [\App\Http\Controllers\Admin\ProductController::class, 'storeMedia'])->name('products.storeMedia');
    //Route::resource('products', \App\Http\Controllers\Admin\ProductController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Category
    //Route::resource('content-categories', \App\Http\Controllers\Admin\ContentCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Tag
    //Route::resource('content-tags', \App\Http\Controllers\Admin\ContentTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Page
    //Route::post('content-pages/media', [\App\Http\Controllers\Admin\ContentPageController::class, 'storeMedia'])->name('content-pages.storeMedia');
    //Route::resource('content-pages', \App\Http\Controllers\Admin\ContentPageController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Calendar
    //Route::resource('system-calendars', \App\Http\Controllers\Admin\SystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Crm Status
    //Route::resource('crm-statuses', \App\Http\Controllers\Admin\CrmStatusController::class, ['except' => ['store', 'update', 'destroy']]);

    // Crm Customer
    //Route::resource('crm-customers', \App\Http\Controllers\Admin\CrmCustomerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Crm Note
    //Route::resource('crm-notes', \App\Http\Controllers\Admin\CrmNoteController::class, ['except' => ['store', 'update', 'destroy']]);

    // Crm Document
    //Route::post('crm-documents/media', [\App\Http\Controllers\Admin\CrmDocumentController::class, 'storeMedia'])->name('crm-documents.storeMedia');
    //Route::resource('crm-documents', \App\Http\Controllers\Admin\CrmDocumentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Status
    //Route::resource('task-statuses', \App\Http\Controllers\Admin\TaskStatusController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Tag
    //Route::resource('task-tags', \App\Http\Controllers\Admin\TaskTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task
    //Route::post('tasks/media', [\App\Http\Controllers\Admin\TaskController::class, 'storeMedia'])->name('tasks.storeMedia');
    //Route::resource('tasks', \App\Http\Controllers\Admin\TaskController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Calendar
    //Route::resource('task-calendars', \App\Http\Controllers\Admin\TaskCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Faq Category
    //Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Faq Question
    //Route::resource('faq-questions', \App\Http\Controllers\Admin\FaqQuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact Company
    //Route::resource('contact-companies', \App\Http\Controllers\Admin\ContactCompanyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact Contacts
    //Route::resource('contact-contacts', \App\Http\Controllers\Admin\ContactContactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Courses
    //Route::post('courses/media', [\App\Http\Controllers\Admin\CourseController::class, 'storeMedia'])->name('courses.storeMedia');
    //Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Lessons
    //Route::post('lessons/media', [\App\Http\Controllers\Admin\LessonController::class, 'storeMedia'])->name('lessons.storeMedia');
    //Route::resource('lessons', \App\Http\Controllers\Admin\LessonController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tests
    //Route::resource('tests', \App\Http\Controllers\Admin\TestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Questions
    //Route::post('questions/media', [\App\Http\Controllers\Admin\QuestionController::class, 'storeMedia'])->name('questions.storeMedia');
    //Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Question Options
    //Route::resource('question-options', \App\Http\Controllers\Admin\QuestionOptionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test Results
    //Route::resource('test-results', \App\Http\Controllers\Admin\TestResultController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test Answers
    //Route::resource('test-answers', \App\Http\Controllers\Admin\TestAnswerController::class, ['except' => ['store', 'update', 'destroy']]);

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dev', function() {

    //$fullInvoices = (new \App\Service\InvoiceService())->fullInvoices('', '', 'all', 30, 0, 0);
    //dd($fullInvoices);

    //$fullInvoice = (new \App\Service\InvoiceService())->fullInvoiceById(1);
    //dd($fullInvoice);

    //$fullInvoice = (new \App\Service\InvoiceService())->fullInvoiceByNumber(10062);
    //dd($fullInvoice);

    $invoice = \App\Models\Invoice::find(1);
    dd($invoice);

});
