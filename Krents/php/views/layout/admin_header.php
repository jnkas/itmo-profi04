<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top" style="    width: 100%;">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin">ITMO labs adminpanel</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="<?php echo app()->request->getUrl() === '/admin/calendar'  || app()->request->getUrl() === '/admin' ? 'active' : ''?>"><a href="/admin/calendar">События календаря</a></li>
            <li class="<?php echo app()->request->getUrl() === '/admin/pages_files'  ? 'active' : ''?>"><a href="/admin/pages_files">Создание страниц(файлы)</a></li>
            <li class="<?php echo app()->request->getUrl() === '/admin/pages'  ? 'active' : ''?>"><a href="/admin/pages">Усправлениями страницами(хранилище)</a></li>
        </ul>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="/admin/logout">
                        Выход
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2" style="width: 80%; margin-left: 10%">
        <div class="panel panel-default">
