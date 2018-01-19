<?php

use Framework\Router;

Router::get('/hw/first', 'Controllers\FirstHomeWorkController@index');

//First lab
Router::get('/calendar', 'Controllers\CalendarController@index');
Router::post('/calendar/get_event', 'Controllers\CalendarController@getEvent');

//Second lab
Router::get('/admin', 'Controllers\Admin\CalendarController@index');
Router::get('/admin/calendar', 'Controllers\Admin\CalendarController@index');
Router::post('/calendar/add_event', 'Controllers\Admin\CalendarController@addEvent');

// Third lab
Router::post('/calendar/get_filter_event', 'Controllers\CalendarController@getFilterEvent');

// Fourth lab
Router::all('/admin/auth', 'Controllers\Admin\AuthController@auth');
Router::all('/admin/logout', 'Controllers\Admin\AuthController@logout');

// Sixth lab - save pages at file
Router::get('/pages_files/{id}', 'Controllers\PageController@showFromFiles');
Router::get('/admin/pages_files', 'Controllers\Admin\PageAtFilesController@index');
Router::post('/admin/pages_files/add', 'Controllers\Admin\PageAtFilesController@create');

// Seventh lab - binary tree
Router::get('/binary', 'Controllers\BinaryTreeController@build');


// Seventh lab - save pages at file
Router::get('/page/{id}', 'Controllers\PageController@show');
Router::get('/admin/page', 'Controllers\Admin\PageController@index');
Router::post('/admin/page/add', 'Controllers\Admin\PageController@create');
Router::get('/admin/page/delete/{id}', 'Controllers\Admin\PageController@delete');
Router::all('/admin/page/edit/{id}', 'Controllers\Admin\PageController@edit');

// 13.01 lessons stack and queue lab
Router::get('/stack', 'Controllers\TestLabControllers@stack');
Router::get('/queue', 'Controllers\TestLabControllers@queue');
Router::get('/test/{id}', 'Controllers\TestLabControllers@test');
Router::get('/request_test', 'Controllers\TestLabControllers@testRequest');

