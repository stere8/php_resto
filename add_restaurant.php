<?php include 'header.php';
$pagetitle = 'MENU' ;?>

     <div class="container">
 <div class="d-flex justify-content-center">
     <p class="title"><h1>ADDING A RESTAURANT</h1></p>
 </div>
     </div>
<form method="POST" class="col container-fluid responsive-table" action="process.php?action=addrestaurant">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter restaurant's name">
    </div><div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" placeholder="Enter restaurant's description"></textarea>
    </div><div class="form-group">
        <label for="phone">Phone number</label>
        <input type="text" class="form-control" name="phone" placeholder="enter restaurant's phone number">
    </div><div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="enter restaurant's email">
    </div><div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" name="website" placeholder="enter restaurant's website">
    </div><div class="form-group">
        <label class="col" for="streetname">Street name</label>
        <input type="text" class="form-control col" name="streetname" placeholder="enter restaurant's street name">
    </div><div class="form-group">
        <label class="col" for="streetnumber">Street number</label>
        <input type="text" class="form-control col" name="streetnumber" placeholder="enter restaurant's street number">
    </div><div class="form-row">
            <div class="form-group col md-2">
        <label for="city">City</label>
            </div><div class="form-group col md-5">
        <select name="city">

            <option value="" disabled selected>Choose the city</option>
            <?php
            $cities = $database -> getRows('city');
            foreach ($cities as $city){
            ?>
            <option value="<?php echo $city['CITY_ID']; ?>"><?php echo $city['CITY_NAME']?></option><?php } ?>

        </select>
        </div><div class="form-group col md-3">
        <label for="postcode">PostCode</label>
            </div><div class="form-group col md-2">
                <input type="text" class="form-control" name="postcode" placeholder="enter restaurant's PostCode"></div>
        </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="submit" name="submit" class="btn btn-primary" value="ADD"/>

        </div>
    </div>
</form>
 <?php include 'footer.php'; ?>