<?php

use Illuminate\Support\Facades\Route;

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
//Front Controller
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');

Route::get('/post/{id}/{slug}',[App\Http\Controllers\FrontController::class, 'showPost'])->name('post.show');
Route::get('/category/{slug}','App\Http\Controllers\FrontController@allCategoryPost')->name('allcategorypost.list');
Route::get('/posts/{name}/{id}/{username}','App\Http\Controllers\FrontController@allUserPost')->name('alluserpost.list');
Route::get('/topviewblog','App\Http\Controllers\FrontController@topviewblog')->name('topviewblog');
Route::post('/search', [App\Http\Controllers\FrontController::class, 'search'])->name('post.search');
Route::post('search-post', [App\Http\Controllers\FrontController::class, 'searchPost']);
//Comment Controller
Route::get('/comments/create','App\Http\Controllers\Backend\CommentController@create')->name('comments.create');
Route::post('/comments/store','App\Http\Controllers\Backend\CommentController@store')->name('comments.store');
// Contact Controller
Route::get('/contacts/create','App\Http\Controllers\Backend\ContactController@create')->name('contacts.create');
Route::post('/contacts/store', [App\Http\Controllers\Backend\ContactController::class, 'store'])->name('contacts.store');

//google login
Route::get('auth/google', 'App\Http\Controllers\LoginController@redirectToGoogle')->name('google.redirect');
Route::get('auth/google/callback', 'App\Http\Controllers\LoginController@handleGoogleCallback')->name('google.callback');

//admin login
Route::middleware('admin:admin')->group(function () {
    Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'loginForm']);
    Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.login');
});

//admin dashboard
Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'has.permission',
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('backend.admin.admin_dashboard');
    })->name('admin.dashboard')->middleware('auth:admin');

    Route::prefix('admin/dashboard')->group(function(){
        //permission
        Route::resource('permissions','App\Http\Controllers\Backend\PermissionController');
        //role
        Route::resource('roles','App\Http\Controllers\Backend\RoleController');
        //user
        Route::resource('users','App\Http\Controllers\UserController');
        //admin routes
        Route::controller(App\Http\Controllers\AdminController::class)->group(function(){
            Route::get('/profile','AdminProfile')->name('admin.profile.view');
            Route::get('/profile/edit','AdminEditProfile')->name('admin.profile.edit');
            Route::patch('/profile/store','AdminStoreProfile')->name('admin.profile.store');
            Route::get('/profile/change/password','AdminPasswordProfile')->name('admin.profile.password');
            Route::patch('/profile/update/password','AdminUpdatePassword')->name('admin.password.update');
            Route::get('/admins','AdminIndex')->name('admins.index');
            Route::get('/create','AdminCreate')->name('admins.create');
            Route::post('/store','AdminStore')->name('admins.store');
            Route::get('/edit/{id}','AdminEdit')->name('admins.edit');
            Route::patch('/update/{id}','AdminUpdate')->name('admins.update');
            Route::delete('/delete/{id}','AdminDelete')->name('admins.delete');
        });
        //category
        Route::resource('categorys','App\Http\Controllers\Backend\CategoryController');
        //post
        Route::controller(App\Http\Controllers\Backend\PostController::class)->group(function(){
            Route::get('/posts/create','create')->name('posts.create');
            Route::post('/posts/store','store')->name('posts.store');
            Route::get('/posts','index')->name('posts.index');
            Route::get('/posts/preview/{id}/{slug}','show')->name('posts.show');
            Route::delete('/posts/destroy/{id}','destroy')->name('posts.destroy');
            Route::get('/posts/{id}/{slug}/edit', 'edit')->name('posts.edit');
            Route::patch('/posts/{id}/update', 'update')->name('posts.update');
            //pending
            Route::get('/pending','PendingIndex')->name('pending.index');
            Route::patch('accept-reject-post/{id}','acceptReject')->name('accept.reject');
            Route::post('/postmessage/{id}','postMessage')->name('pending.message');
        });
        //advertisement
        Route::resource('advertisements','App\Http\Controllers\Backend\AdsController');
        //Contact Controller
        Route::get('/contacts','App\Http\Controllers\Backend\ContactController@index')->name('contacts.index');
        Route::delete('/contacts/destroy/{id}','App\Http\Controllers\Backend\ContactController@destroy')->name('contacts.destroy');
        //admin Comment
        Route::get('/allcomments','App\Http\Controllers\Backend\CommentController@adminindex')->name('allcomments.index');
        Route::delete('/allcomments/destroy/{id}','App\Http\Controllers\Backend\CommentController@admindestroy')->name('allcomments.destroy');
    });
});

//user dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'has.permission',
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->group(function(){
        Route::prefix('profile')->group(function(){
            Route::get('/view', [App\Http\Controllers\UserController::class, 'ProfileView'])->name('profile.view');
            Route::get('/profile-edit', [App\Http\Controllers\UserController::class, 'ProfileEdit'])->name('profile.edit');
            Route::patch('/update', [App\Http\Controllers\UserController::class, 'ProfileUpdate'])->name('profile.update');
            Route::get('/password/view', [App\Http\Controllers\UserController::class, 'PasswordView'])->name('password.view');
            Route::patch('/password/change', [App\Http\Controllers\UserController::class, 'PasswordChange'])->name('password.change');
        });

        //userpost Controller
        Route::get('/userposts/create','App\Http\Controllers\Backend\UserpostController@create')->name('userposts.create');
        Route::post('/userposts/store','App\Http\Controllers\Backend\UserpostController@store')->name('userposts.store');
        Route::get('/userposts','App\Http\Controllers\Backend\UserpostController@index')->name('userposts.index');
        Route::get('/userposts/preview/{id}/{slug}','App\Http\Controllers\Backend\UserpostController@show')->name('userposts.show');
        Route::delete('/userposts/destroy/{id}','App\Http\Controllers\Backend\UserpostController@destroy')->name('userposts.destroy');
        Route::get('/userposts/{id}/{slug}/edit', 'App\Http\Controllers\Backend\UserpostController@edit')->name('userposts.edit');
        Route::patch('/userposts/{id}/update', 'App\Http\Controllers\Backend\UserpostController@update')->name('userposts.update');

        //Comment Controller
        Route::get('/comments','App\Http\Controllers\Backend\CommentController@index')->name('comments.index');
        Route::delete('/comments/destroy/{id}','App\Http\Controllers\Backend\CommentController@destroy')->name('comments.destroy');
    });
});
