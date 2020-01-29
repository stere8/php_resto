<?php include 'header.php';
$pagetitle = 'MENU' ;?>
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>RESTOLOOKUP</h1>
            <p class="lead text-muted">Welcome to Restolookup a page to look for restaurants according too your location and get more informations about the resaurants.<p>
            </p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col" >
                    <div class="card d-flex justify-content-center">
                        <a href="restaurant_list.php">
                            <div class="text-center justify-content-center">
                                <img width="50%" height="225" src="images/list-icon.png">
                            </div>
                            <div class="card-body">
                                <p class="card-text text-dark text-center">Click here to view the list of restaurants</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col" >
                    <div class="card d-flex justify-content-center">
                        <a href="add_restaurant.php">
                            <div class="text-center justify-content-center">
                                <img width="50%" height="225" src="images/add-icon.png">
                            </div>
                            <div class="card-body">
                                <p class="card-text text-dark text-center">Click here to view the list of restaurants</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ; ?>


