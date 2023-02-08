<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
    <link rel="stylesheet" href="<?= base_url?>assets/css/styles.css">
    <title>Tienda de Camiseta</title>
</head>
<body class='body'>
    <!--CABECERA-->
    <header id="header" class="container-xl">
        <div id="logo">
            <img src="<?= base_url?>assets/img/camiseta.png" alt="FOTO">
        </div>
    </header>
    <div class="container-xl">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=base_url?>">Tienda Americana</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?=base_url?>/usuario/index">Link</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-xl">

        <div class="row my-5">
            <div class="col-md-2">