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

// Seventh lab - binary tree
Router::get('/binary', 'Controllers\BinaryTreeController@build');

// Sixth lab - save pages at file
Router::get('/pages_files/{id}', 'Controllers\PageController@showFromFiles');
Router::get('/admin/pages_files', 'Controllers\Admin\PageAtFilesController@index');
Router::post('/admin/pages_files/add', 'Controllers\Admin\PageAtFilesController@create');

// 13.01 lessons stack and queue lab
Router::get('/stack', 'Controllers\TestLabControllers@stack');
Router::get('/queue', 'Controllers\TestLabControllers@queue');
Router::get('/test/{id}', 'Controllers\TestLabControllers@test');
Router::get('/request_test', 'Controllers\TestLabControllers@testRequest');


Router::get('/admin/pages', 'Controllers\Admin\PageController@index');