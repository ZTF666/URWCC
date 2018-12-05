<?php
include('DAO.php');

$udao = new DAO();

//get the hidden inputs information
$id_place=$_POST['id_place'];
$user_id=$_POST['id_user'];
$name_place=addslashes($_POST['name_place']);

//if shop liked
if(isset($_POST['like'])){

$udao->LikeShop($id_place,$name_place,$user_id);
echo $user_id;
echo $id_place;
echo $name_place;

header('location:../../front/NearbyShops.php');

//if shop hated (not visible)
}
else if(isset($_POST['URGH'])){
    $udao->UrghShop($id_place,$name_place,$user_id);
    
    header('location:../../front/NearbyShops.php');
}
//if shop liked then disliked
else{
    $udao->DislikeShop($id_place,$user_id);

    header('location:../../front/PreferredShops.php');
    

}


?>