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
foreach ($image_reference as &$item){
    $where2['IMAGE_ID'] = '='.$item['IMAGE_ID'];
    $images = $database -> getRows('image',"*",$where2);
    foreach ($images as &$image){
        array_push($image_path, ['IMAGE_PATH'=> $image['IMAGE_PATH'], 'IMAGE_DESCRIPTION'=> $image['IMAGE_DESCRIPTION'], 'IMAGE_ID'=>$image['IMAGE_ID']]);
    }
}
?>
<?php /*if(isset($_POST['submit'])){
    $data =[
            'IMAGE_PATH' => 'images/'.strip_tags($_POST['image']),
            'IMAGE_DESCRIPTION' => strip_tags($_POST['description'])
    ];
    $database -> insertRows('image',$data);
    $datas = [
            'IMAGE_ID' => $database -> getLastInsertedId(),
            'RESTAURANT_ID' => $restaurant_id
    ];
    $database -> insertRows('image-restaurants', $datas);
    header('Location: index2.php');
}*/?>
<div class="col container-fluid responsive-table">
    <table class="table table-striped table-hover ">
        <thead class="thead">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($image_path as &$image){ ?>
        <tr>
            <td scope="row"> <img src=" <?php echo $image['IMAGE_PATH']; ?> "> </td>
            <td scope="row"> <?php echo $image['IMAGE_DESCRIPTION'];  ?></td>
            <td scope="row"> <a href="process.php?action=deletephoto&image_id=<?php echo $image['IMAGE_ID'] ?>&restaurant_id=<?php echo $restaurant_id ?>" class="btn btn-danger">Delete</a>
            </td> <?php } ?>
        </tr>
        </tbody> </table></div><div>
<form method="POST" class="col container-fluid responsive-table" action="process.php?action=addphoto&image_id=<?php echo $restaurant_id ?>" >
    <div class="form-group">
        <input type="file" name="image" accept="image/jpeg">
        <textarea name="description"></textarea>
        <input type="submit" name="submit" >
    </div></div>
<?php include 'footer.php'?>
