<?php
include('DAO.php');

$udao = new DAO();
//get hidden input info created by the JS script(check api)

$id_place=$_POST['id_place'];
$name_place=$_POST['name_place'];
$lt_place=$_POST['lt_place'];
$lg_place=$_POST['lg_place'];
$distance_place=$_POST['distance_place'];
$user_id=$_POST['user_id'];


foreach($_POST["id_place"] as $record=> $value){

    $id_place = $_POST["id_place"][$record];
        $name_place = addslashes($_POST["name_place"][$record]);
        $lt_place = $_POST["lt_place"][$record];
        $lg_place = $_POST["lg_place"][$record];
        $distance_place=$_POST['distance_place'][$record];
        $udao->SavePlaces($id_place,$name_place,$lt_place,$lg_place,$distance_place,$user_id);
       
  
}


        header('location:../../front/NearbyShops.php');



?>