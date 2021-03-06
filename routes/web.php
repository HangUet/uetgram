<?php

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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'albums'], function(){
    //Xem danh sach album root
    Route::get('/', [
        'as'   => 'album.index',
        'uses' => 'AlbumsController@index'
    ]);

    //Tao album moi
    Route::get('{idAlbumf}/new', [
        'as'   => 'album.new',
        'uses' => 'AlbumsController@new'
    ]);

    //Luu album moi
    Route::post('{idAlbumf}/store', [
        'as'  => 'album.store',
        'uses'=> 'AlbumsController@store'
    ]);

    //Xem mot album
    Route::get('{idAlbum}', [
        'as'   => 'album.show',
        'uses' => 'AlbumsController@show'
    ]);

    //Xoa mot album
    Route::delete('delete/{idAlbum}', [
        'as'   => 'album.destroy',
        'uses' => 'AlbumsController@destroy'
    ]);

});

Route::group(['prefix'=>'images'], function(){
    //Xem toan bo anh
    Route::get('/', [
        'as'  => 'image.index',
        'uses'=> 'ImagesController@index'
    ]);

    //Dang anh vao album
    Route::post('album{idAlbum}/addimg', [
        'as'  => 'image.addimg',
        'uses'=> 'ImagesController@addimg'
    ]);

    //Xem chi tiet mot anh
    Route::get('show/{idImg}', [
        'as'  => 'image.show',
        'uses'=> 'ImagesController@show'
    ]);

    //Xoa anh
    Route::delete('{idImage}', [
        'as'   => 'image.destroy',
        'uses' => 'ImagesController@destroy'
    ]);

    Route::group(['prefix'=>'tags'], function(){
        //Them tag
        Route::post('{idImage}/addtag', [
            'as'  => 'tag.store',
            'uses'=> 'TagsController@store'
        ]);

        //Xem tat ca anh co cung tag
        Route::get('{tag}', [
            'as'   => 'tag.findimages',
            'uses' => 'TagsController@findimages'
        ]);

        //Xoa tag
        Route::delete('{idImg}/delete/{idTag}', [
            'as'   => 'tag.destroy',
            'uses' => 'TagsController@destroy'
        ]);
    });

    Route::group(['prefix'=>'comments'], function(){
        //Gui comment
        Route::post('{idImage}/addcomment', [
            'as'  => 'comment.store',
            'uses'=> 'CommentsController@store'
        ]);

        //Xoa comment
        Route::delete('delete/{idComment}', [
            'as'   => 'comment.destroy',
            'uses' => 'CommentsController@destroy'
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
