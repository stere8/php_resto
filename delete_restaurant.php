<?php include 'header.php';
$pagetitle = 'MENU' ;?>
<?php
if(!isset($_GET['id'])){
    exit();
}

$restaurant_id = $_GET['id'];
$where['RESTAURANT_ID'] = '='.$restaurant_id;
$restaurant = $database -> getRow('restaurant_view',"*",$where);

?>
<?php
if(isset($_POST['yes'])){
$database -> removeRows('restaurant',$where);
    header( "Location: index2.php" );
}
if(isset($_POST['no'])){
    header( "Location: index2.php" );
}

?>
<div class="container">
    <div class="d-flex justify-content-center">
        <p class="title"><h1>DELETE HOTEL </h1></p>
    </div>
</div>
<div class="container text-center">
    <br><br>
    <h2>Are you sure you want to delete the restaurant <a href="info_restaurant.php?id=<?php echo $restaurant['RESTAURANT_ID'] ?>"> <?php  echo $restaurant['RESTAURANT_NAME'] ?></a></h2>
    <br>
    <form method="post">
        <input class="btn btn-danger" type="submit" name="yes"
               value="YES"/>

        <input class="btn btn-primary" type="submit" name="no"
               value="NO"/>
    </form>
</div>
<?include 'footer.php' ;
?>
