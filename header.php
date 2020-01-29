<?php
require_once('lib/database.php');
$database = new Database();
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php $pagetitle ="" ;?>
    <title><?php echo $pagetitle ;?></title>
</head>
<body >
<div class="bg-light">
<br class="">
    <nav class="navbar navbar-expand-md   navbar-white fixed-top bg-dark ">
        <a class="navbar-brand text-secondary text-white" href="index2.php"><img src="images/restolookup_logo.png" width="100" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                    <a class="nav-link text-secondary" href='restaurant_list.php'>List of restaurants<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-secondary" href="add_restaurant.php">Add new restaurant</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    </br></br>
</div>