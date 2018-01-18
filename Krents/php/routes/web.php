<?php

use Framework\Router;

Router::get('/hw/first', 'Controllers\FirstHomeWorkController@index');

//First lab
Router::get('/calendar', 'Controllers\CalendarController@index');
Router::post('/calendar/get_event', 'Controllers\CalendarController@getEvent');

//Second lab
Router::get('/calendar/admin', 'Controllers\AdminCalendarController@index');
Router::post('/calendar/add_event', 'Controllers\AdminCalendarController@addEvent');

// Third lab
Router::post('/calendar/get_filter_event', 'Controllers\CalendarController@getFilterEvent');

// Fourth lab
Router::post('/auth', 'Controllers\AdminCalendarController@auth');

// Sixth lab - binary tree
Router::get('/binary', 'Controllers\BinaryTreeController@build');

// 13.01 lessons stack and queue lab
Router::get('/stack', 'Controllers\TestLabControllers@stack');
Router::get('/queue', 'Controllers\TestLabControllers@queue');
Router::get('/test/{id}', 'Controllers\TestLabControllers@test');