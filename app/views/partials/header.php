<?php
$auth = auth();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Our Blog</title>
</head>

<body>
<header>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="ml-auto form-inline">
                    <?php if($auth->hasRole(\Delight\Auth\Role::ADMIN)): ?>
                        <a href="/admin" class="btn btn-success mr-4">Войти в админку</a>
                    <?php endif; ?>
                    <?php if(!$auth->isLoggedIn()): ?>
                    <a href="/login" class="btn btn-primary ml-4">Войти</a>
                    <a href="/register" class="btn btn-success ml-4">Зарегистрироватся</a>
                    <?php else: ?>
                    <b style="color: #fff">Привет, <?=$auth->getUsername(); ?></b>
                    <a href="/profile" class="btn btn-primary ml-4">Мой профиль</a>
                    <a href="/logout" class="btn btn-secondary ml-4">Выйти</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</header>
