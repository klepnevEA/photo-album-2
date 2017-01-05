<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/login', ['uses' => 'MainController@login']);

Route::get('/development', ['uses' => 'MainController@development']);

// Создание пользователя
Route::post('/api/user', 'UserController@create');
// Активация пользователя
Route::get('/api/user/activate/{id}/{activation_code}', 'UserController@activate');
// Авторизация
Route::post('/api/user/auth', 'UserController@auth');
// Проверка авторизации
Route::get('/api/user/islogined', 'UserController@isLogined');
// Выход
Route::get('/api/user/logout', 'UserController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'MainController@main']);

    // Поиск
    Route::get('/api/search', 'SearchController@search');

    // Получение текущего данных юзера
    Route::get('/api/user', 'UserController@get');
    // Редактирование данных пользователя
    Route::post('/api/user/edit', 'UserController@edit');
    // Получение всех альбомов пользователя
    Route::get('/api/user/albums', 'UserController@getAlbums');
    // Получение всех фото пользователя
    Route::get('/api/user/photos', 'UserController@getPhotos');
    // Получение всех фото пользователя по id
    Route::get('/api/user/photos/{id}', 'UserController@getPhotos');

    // Создание фото
    Route::post('/api/photo', 'PhotoController@create');
    // Редактирование фото
    Route::post('/api/photo/{id}', 'PhotoController@edit');
    // Получение фото
    Route::get('/api/photo', 'PhotoController@get');
    // Получение альбома фото
    Route::get('/api/photo/album', 'PhotoController@getAlbum');
    // Получение пользователя разместившего фото
    Route::get('/api/photo/user', 'PhotoController@getUser');
    // Получение кол-ва лайков фото
    Route::get('/api/photo/likes-count', 'PhotoController@getLikesCount');
    // Получение комментариев к фото
    Route::get('/api/photo/comments', 'PhotoController@getComments');
    // Получение кол-ва комментариев к фото
    Route::get('/api/photo/comments-count', 'PhotoController@getCommentsCount');
    // Удаление фото
    Route::delete('/api/photo/{id}', 'PhotoController@delete');


    // Создание альбома
    Route::post('/api/album', 'AlbumController@create');
    // Редактирование альбома
    Route::post('/api/album/{id}', 'AlbumController@edit');
    // Получение альбома
    Route::get('/api/album', 'AlbumController@get');
    // Получение обложки альбома
    Route::get('/api/album/cover', 'AlbumController@getCover');
    // Получение всех фото альбома
    Route::get('/api/album/photos', 'AlbumController@getPhotos');
    // Получение кол-ва всех фото альбома
    Route::get('/api/album/photos-count', 'AlbumController@getPhotosCount');
    // Удаление альбома
    Route::delete('/api/album', 'AlbumController@delete');

    // Создание комментария
    Route::post('/api/comment', 'CommentController@create');
    // Редактирование комментария
    Route::post('/api/comment/{id}', 'CommentController@edit');
    // Получение комментария
    Route::get('/api/comment/{id}', 'CommentController@get');
    // Получение комментария
    Route::get('/api/comment/{id}', 'CommentController@get');

    // Лайк
    Route::post('/api/like/{id}', 'LikeController@like');
    // Анлайк
    Route::delete('/api/like/{id}', 'LikeController@unlike');
});

