<?php
require_once('lib/database.php');

if(!isset($_GET['action']) || empty($_GET['action'])){
    die();
}
switch ($_GET['action']){
    case 'addrestaurant':
        $database = new Database();
        $datas =[
            'RESTAURANT_NAME' => strip_tags($_POST['name']),
            'RESTAURANT_DESCRIPTION' => strip_tags($_POST['description']),
            'RESTAURANT_TELEPHONE_NUMBER' => strip_tags($_POST['phone']),
            'RESTAURANT_EMAIL' => strip_tags($_POST['email']),
            'RESTAURANT_WEBSITE'=> strip_tags($_POST['website']),
            'RESTAURANT_STREET_NAME' => strip_tags($_POST['streetname']),
            'RESTAURANT_STREET_NUMBER'=> strip_tags($_POST['streetnumber']),
            'RESTAURANT_POSTCODE'=> strip_tags($_POST['postcode']),
            'RESTAURANT_CITY'=> strip_tags($_POST['city'])
        ];
        $database -> insertRows('restaurant', $datas);
        header('Location:index2.php');
        break;
    case 'editrestaurant':
        $database = new Database();
        $restaurant_id = $_GET['id'];
        $datas =[
            'RESTAURANT_NAME' => strip_tags($_POST['name']),
            'RESTAURANT_DESCRIPTION' => strip_tags($_POST['description']),
            'RESTAURANT_TELEPHONE_NUMBER' => strip_tags($_POST['phone']),
            'RESTAURANT_EMAIL' => strip_tags($_POST['email']),
            'RESTAURANT_WEBSITE'=> strip_tags($_POST['website']),
            'RESTAURANT_STREET_NAME' => strip_tags($_POST['streetname']),
            'RESTAURANT_STREET_NUMBER'=> strip_tags($_POST['streetnumber']),
            'RESTAURANT_POSTCODE'=> strip_tags($_POST['postcode']),
            'RESTAURANT_CITY'=> strip_tags($_POST['city'])
        ];$where_data['RESTAURANT_ID']="=".$restaurant_id;
        $database -> updateRows('restaurant', $datas,$where_data);
        header('Location:index2.php');
        break;
    case 'addphoto':
        $database = new Database();
        $restaurant_id = $_GET['id'];
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
        $dest = 'add_image.php?id='.$restaurant_id;
        header('Location: '.$dest);
        break;
    case 'deletephoto':
        $database = new Database();
        $image_id = $_GET['$image_id'];
        $restaurant_id=$_GET['restaurant_id'];
        $where['IMAGE_ID'] = '='.$image_id;
        $database -> removeRows('image',$where);
        $dest = 'add_image.php?id='.$restaurant_id;
        header('Location: '.$dest);
    //default:
       // header('Location: index2.php');
    case 'addreview':
        $database = new Database();
        $restaurant_id =  $_GET['rid'];
        $data=[
            'REVIEW_USER' => strip_tags($_POST['name']),
            'RESTAURANT_ID' => $_GET['rid'],
            'REVIEW_DESCRIPTION' => strip_tags($_POST['review']),
            'REVIEW_RATING' => strip_tags($_POST['rating']),

        ];
        $database -> insertRows('review', $data);
        $dest = 'info_restaurant.php?id='.$restaurant_id;
        header('Location:'.$dest);
        break;





}