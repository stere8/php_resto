<?php include 'header.php';
$pagetitle = 'MENU' ;?>
<div class="col container-fluid responsive-table">
    <table class="table table-striped table-dark table-hover ">
        <thead class="thead-dark">
         <tr>
             <th scope="col">#</th>
             <th scope="col">Name</th>
             <th>Address</th>
             <th scope="col">Telephone Number</th>
             <th scope="col">Action</th>
         </tr>
        </thead>
        <tbody class="">
        <?php
        $restaurants = $database -> getRows('restaurant_view');
        $count = 0;
        foreach ($restaurants as &$restaurant ){
            $count++;
        $address = $restaurant['RESTAURANT_STREET_NAME']. ' ' .$restaurant['RESTAURANT_STREET_NUMBER'].', '.$restaurant['RESTAURANT_POSTCODE'].' '.$restaurant['CITY_NAME']
        ?>
          <tr>
              <th scope="row"><?php echo $count ?></th>
              <td><?php echo $restaurant['RESTAURANT_NAME']?></td>
              <td><?php echo $address?></td>
              <td><?php echo $restaurant['RESTAURANT_TELEPHONE_NUMBER'] ?></td>
              <td>
                  <form method="post">
                  <a href="info_restaurant.php?id=<?php echo $restaurant['RESTAURANT_ID'] ?>" class="btn btn-info">Info</a>
                  <a href="edit_restaurant.php?id=<?php echo $restaurant['RESTAURANT_ID'] ?>" class="btn btn-warning">Edit</a>
                  <a href="delete_restaurant.php?id=<?php echo $restaurant['RESTAURANT_ID'] ?>" class="btn btn-danger">Delete</a>
                  </form>
              </td>
          </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php' ; ?>


