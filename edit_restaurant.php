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
?>

<div class="container">
    <div class="d-flex justify-content-center">
        <p class="title"><h1>EDITING RESTAURANT </h1></p>
    </div><div class="d-flex justify-content-center">
        <p> <a href="add_image.php?id=<?php echo $restaurant['RESTAURANT_ID'] ?>" class="btn btn-info">Images</a> </p>
    </div>
</div>
<form method="POST" class="col container-fluid responsive-table" action="process.php?action=editrestaurant&id=<?php echo $restaurant_id ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?php if(!empty($restaurant)){ echo $restaurant["RESTAURANT_NAME"]; } ?>" placeholder="Enter Restaurant's name">
    </div><div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" placeholder="Enter Restaurant's description"><?php  echo $restaurant['RESTAURANT_DESCRIPTION'] ?></textarea>
    </div><div class="form-group">
        <label for="phone">Phone number</label>
        <input type="text" class="form-control" name="phone" value="<?php  echo $restaurant['RESTAURANT_TELEPHONE_NUMBER'] ?>" placeholder="enter Restaurant's phone number">
    </div><div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?php  echo $restaurant['RESTAURANT_EMAIL'] ?>" placeholder="enter Restaurant's email">
    </div><div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" name="website" value="<?php  echo $restaurant['RESTAURANT_WEBSITE'] ?>" placeholder="enter Restaurant's website">
    </div><div class="form-group">
        <label class="col" for="streetname">Street name</label>
        <input type="text" class="form-control col" name="streetname" value="<?php  echo $restaurant['RESTAURANT_STREET_NAME'] ?>" placeholder="enter Restaurant's street name">
    </div><div class="form-group">
        <label class="col" for="streetnumber">Street number</label>
        <input type="text" class="form-control col" name="streetnumber" value="<?php  echo $restaurant['RESTAURANT_STREET_NUMBER'] ?>" placeholder="enter Restaurant's street number">
    </div><div class="form-row">
        <div class="form-group col md-2">
            <label for="city">City</label>
        </div><div class="form-group col md-5">
            <select name="city">

                <option value="" >Choose the city</option>
                <?php
                $cities = $database -> getRows('city');
                foreach ($cities as $city){
                    if($city['CITY_ID'] == $restaurant['RESTAURANT_CITY'])
                    { ?>
                        <option value="<?php echo $city['CITY_ID']; ?>" selected><?php echo $city['CITY_NAME']?></option><?php  ?>
                    <?php }
                else {
                    ?>
                    <option value="<?php echo $city['CITY_ID']; ?>" selected><?php echo $city['CITY_NAME']?></option><?php }} ?>

            </select>
        </div><div class="form-group col md-3">
            <label for="postcode">PostCode</label>
        </div><div class="form-group col md-2">
            <input type="text" class="form-control" name="postcode" value="<?php  echo $restaurant['RESTAURANT_POSTCODE'] ?>" placeholder="enter Restaurant's PostCode"></div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="submit" name="submit" class="btn btn-primary" value="SAVE"/>

        </div>
    </div>
</form>
<?php include 'footer.php'; ?>
