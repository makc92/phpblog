<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>1</title>
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <div class="ml-auto form-inline">

                    <a href="./login.html" class="btn btn-primary ml-4">Войти</a>
                    <a href="./register.html" class="btn btn-success ml-4">Зарегистрироватся</a>
                    <b style="color: #fff">Привет, </b>
                    <a href="./user_post.html" class="btn btn-primary ml-4">Мои записи</a>
                    <a href="./profile.html" class="btn btn-info ml-4">Профиль</a>
                    <a href="" class="btn btn-secondary ml-4">Выйти</a>
                </div>
            </div>
        </nav>
    </div>
</header>
<main>
    <div class="container">
        <h2 class="mb-4">Наш Блог</h2>
        <div class="row">
            <?=$this->section('content')?>
            <div class="col-lg-3">
                <h3>Category Post</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="./category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="./category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="./category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="./category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="./category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="./category.html">Cras justo odio</a></li>
                </ul>
            </div>

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</main>
<footer>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
</footer>

<script src="js/jquery_3.2.1.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>