<?php


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/worker/register','WorkerController@register')->name('worker.register');
Route::post('/worker/register','WorkerController@store')->name('worker.store');

//admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::post('/post/approve', 'PostController@approve')->name('post.approve');
    Route::resource('/post', 'PostController');
    Route::resource('/information', 'InformationController');
    Route::resource('/recommend', 'RecommendController');
    Route::get('/worker-list', 'AdminController@workerList')->name('user.workerList');
    Route::get('/show-worker/{id}', 'AdminController@showWorker')->name('user.showWorker');
    Route::get('/group-worker-list', 'AdminController@groupWorkerList')->name('user.groupWorkerList');
    Route::get('/user-list', 'AdminController@userList')->name('user.userList');
    Route::get('/ban-worker', 'AdminController@banWorker')->name('user.banWorker');
    Route::get('/admin-home', 'HomeController@admin')->name('admin.home');
    Route::get('/sample', 'HomeController@sample')->name('sample');
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');
    Route::post('/change-name', 'ProfileController@changeName')->name('profile.changeName');
    Route::post('/change-email', 'ProfileController@changeEmail')->name('profile.changeEmail');
    Route::post('/change-photo', 'ProfileController@changePhoto')->name('profile.changePhoto');
    Route::resource('/photo', 'PhotoController');
    Route::resource('/recommend', 'RecommendController');
    Route::resource('/comment', 'CommentController');
    Route::resource('/subcategory', 'SubCategoryController');
    Route::get('/subcategory/j/create', 'SubCategoryController@jobCreate')->name('subcategory.jobCreate');
});

// worker
Route::middleware(['auth', 'isWorker'])->prefix('worker')->name('worker.')->group(function () {
    Route::get('/post-list', 'WorkerController@postList')->name('postList');
    Route::get('/create-post', 'WorkerController@createPost')->name('createPost');
    Route::post('/store-post', 'WorkerController@storePost')->name('storePost');
    Route::get('/{post}/edit', 'WorkerController@editPost')->name('editPost');
    Route::put('/{post}', 'WorkerController@updatePost')->name('updatePost');
    Route::get('/{post}', 'WorkerController@showPost')->name('showPost');
    Route::get('/recommend/recommend-list', 'WorkerController@recommendList')->name('recommendList');
});
Route::get('/worker-home', 'HomeController@worker')->name('worker.home')->middleware('isWorker');

//client
Route::middleware(['auth'])->prefix('client')->name('client.')->group(function () {
    Route::post('/store-recommend', 'ClientController@storeRecommend')->name('storeRecommend');
    Route::post('/comment','ClientController@commentPost')->name('commentPost');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('get-townships', 'PublicUseController@getTownships')->name('get-townships');
Route::get('get-jobs', 'PublicUseController@getJobs')->name('get-jobs');
