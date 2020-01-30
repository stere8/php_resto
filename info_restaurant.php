<?php include 'header.php';
$pagetitle = 'MENU' ;?>
<?php
if(!isset($_GET['id'])){
    header('Location: index2.php');
    exit();
}

$restaurant_id = $_GET['id'];
$where['RESTAURANT_ID'] = '='.$restaurant_id;
$restaurant = $database -> getRow('restaurant_view',"*",$where);
$image_reference = $database -> getRows('image-restaurants',"*",$where);
$image_path = array();
$count =0;
foreach ($image_reference as &$item){
    $where2['IMAGE_ID'] = '='.$item['IMAGE_ID'];
    $images = $database -> getRows('image',"*",$where2);
    foreach ($images as &$image){
        array_push($image_path,['IMAGE_PATH'=> $image['IMAGE_PATH'], 'IMAGE_DESCRIPTION'=> $image['IMAGE_DESCRIPTION'], 'IMAGE_ID'=>$image['IMAGE_ID'],'IMAGE_POSITION' => $count]);
        $count++;
    }}
$reviews = $database -> getRows('review',"*",$where);
?>
    <main role="main">
        <div class=" bg-light container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="container text-center">
                        <p><h1><?php echo $restaurant['RESTAURANT_NAME']?></h1></p>
                        <div class="container"><?php echo $restaurant['RESTAURANT_DESCRIPTION'] ?></div>
                    </div>

                </div>
                <div id="myCarousel" class="carousel container col-lg-6 text-center" data-ride="carousel">
                    <div class="flex carousel-inner">
                        <?php foreach ($image_path as $image) {
                        if ($image['IMAGE_POSITION'] == 0) { ?>
                        <div class="carousel-item active text-center">
                            <img class="img-responsive" width="100%" height="450" src="<?php echo $image['IMAGE_PATH']; ?>" alt=" <?php echo $image['IMAGE_DESCRIPTION']; }else{?> " >
                        </div>
                        <div class="carousel-item text-center">
                            <img class="img-responsive" width="100%" height="450" src="<?php echo $image['IMAGE_PATH']; ?>" alt=" <?php echo $image['IMAGE_DESCRIPTION']; }}?> " >
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row text-center container-fluid">
                <div class="col-md-4 container">
                    <p><h1>Contact Details</h1></p>
                   <ul style="list-style-type:none" ><h6>
                       <li>Tel. <a href="tel:<?php echo $restaurant['RESTAURANT_TELEPHONE_NUMBER'] ?>" class=" text-dark"><?php echo $restaurant['RESTAURANT_TELEPHONE_NUMBER'] ?></a></li>
                       <li>Address: ul. <?php echo $restaurant['RESTAURANT_STREET_NAME'].' '.$restaurant['RESTAURANT_STREET_NUMBER'] ?></li>
                       <li> <?php echo ' P.O.Box : '.$restaurant['RESTAURANT_POSTCODE'].', '.$restaurant['CITY_NAME'] ?></li>
                       <li>E-mail: <a href="mailto:<?php echo $restaurant['RESTAURANT_EMAIL'] ?>" class=" text-dark"><?php echo $restaurant['RESTAURANT_EMAIL'] ?></a></li>
                       <li>Website: <a href="<?php echo $restaurant['RESTAURANT_WEBSITE'] ?>"><?php echo $restaurant['RESTAURANT_WEBSITE'] ?></a></li>
                       </h6>
                   </ul>
                </div>
                <div class="col-md-4 offset-4 text-center justify-content-end container">
                    <div class="">
                        <h2>Leave a review</h2>
                    </div>
                    <form method="POST" class="col container-fluid responsive-table" action="process.php?action=addreview&rid=<?php echo $restaurant_id ?>" >
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name name">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating select</label>
                        <select class="form-control" name="rating">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="review">Description</label>
                    <textarea class="form-control" name="review" required placeholder="Leave your Review"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT"/>

                    </form>
                </div>
                </div>
            <div class="row justify-content-end container">
                <div class="container">
                <div class=" text-center"><h1>REVIEWS</h1></div>
                    <hr><br>
                <?php foreach ($reviews as &$review){ ?>
                <div class=" text-center">
                    <p><?php echo $review['REVIEW_DESCRIPTION'].' ';?></p>
                    <p>Rating : <?php echo $review['REVIEW_RATING'].' ';?></p>
                    <h6> <?php echo 'by '.$review['REVIEW_USER']; ?></h6>
                    <hr>
                </div>
    <?php } if (empty($reviews)) {?>
                    <div class="text center">
    <h3>No reviews yet </h3> <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'footer.php' ;?>