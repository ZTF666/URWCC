<?php
include('connexion.php');
include('/MODELS/Place.php');
include('/MODELS/User.php');

class DAO{

    function __construct(){ 
        connection::connect();
    }

    /**********Authenticate**********/


    function Authentification($username,$pwd){

        $query=connection::Select("select * from users where username='".$username."' and pwd='".$pwd."' ");  
        
        if($ligne=$query->fetch()){
            
            $User=new User();
            $User->id=$ligne['id'];
            $User->log=$ligne['log'];
            $User->pwd=$ligne['pwd'];
        }
        return $User;
    }


/***************Register****************/


function RegisterUser($username,$pwd,$email){

    $sql="insert into users (username,pwd,email) values('".$username."','".$pwd."','".$email."') ";

   $ResultSet=connection::Maj($sql); 
}
/************ save ************/
function SavePlaces($id_place,$name_place,$lt_place,$lg_place,$distance_place,$user_id){

$sql="INSERT IGNORE INTO places (id_place,name_place,lt_place,lg_place,distance,user_id) values('".$id_place."','".$name_place."','".$lt_place."','".$lg_place."','".$distance_place."','".$user_id."')
    ON DUPLICATE KEY UPDATE id_place= LAST_INSERT_ID('".$id_place."')";

    $ResultSet=connection::Maj($sql); 
}

/***************Check if record exists****************/

function CheckIfExists($id_place){

    $query=connection::Select("select count(*) as count  from places where id_place= '".$id_place."'");
    return $query;
}
/************Loads all nearby shops************/
function NearbyShops(){

    $tabPlaces=array();

    $query=connection::Select("select * from places where (id_place , user_id )NOT IN (select id_place,id_user from myshops) ORDER BY distance ASC");

    foreach($query as $row){

        $place=new Place();
        $place->id_place=$row['id_place'];
        $place->name_place=$row['name_place'];
        // $place->lt_place=$row['lt_place'];
        // $place->lg_place=$row['lg_place'];
        $place->distance_place=$row['distance'];
        array_push($tabPlaces,$place);

    }
    return $tabPlaces;
    }
/*************************/

/************In this one i took the liberty to assign 1 as the value of a LIKED state for a place************/
/****************************0 being the initial state and 66 for a "AIN'T GOING TO EAT THERE' state for a place**************************/
function PrefNearbyShops($id_user){

    $tabPlaces=array();

    $query=connection::Select("select * from Myshops where status_place NOT IN(0,66)  AND id_user='".$id_user."'");
    foreach($query as $row){

        $place=new Place();
        $place->id_place=$row['id_place'];
        $place->name_place=$row['name_place'];
             array_push($tabPlaces,$place);

    }
    return $tabPlaces;
    }

/**************Update if Liked***************/

function LikeShop($id_place,$name_place,$id_user){

    $sql="insert into MyShops (id_place,name_place,status_place,id_user) values('".$id_place."','".$name_place."',1,'".$id_user."') ";

    $sql1="DELETE FROM places 
    WHERE id_place='".$id_place."'";
    $ResultSet=connection::Maj($sql);
    $ResultSet=connection::Maj($sql1); 

}
/**************Update if Disliked***************/

function DislikeShop($id_place,$user_id){


    $sql="DELETE FROM myshops 
    WHERE id_place='".$id_place."' AND id_user='".$user_id."'";
    $ResultSet=connection::Maj($sql);

    }

/**************Update if URGH definetly not going to this one **************/
    function UrghShop($id_place,$name_place,$id_user){

        $sql="insert into MyShops (id_place,name_place,status_place,date_of_like_place,id_user) values('".$id_place."','".$name_place."',66,NOW(),'".$id_user."') ";

        $sql1="DELETE FROM places 
        WHERE id_place='".$id_place."'";
        $ResultSet=connection::Maj($sql);
        $ResultSet=connection::Maj($sql1); 


        }
    
/***********************Clear non preferred shops from DB after two hours***********************/
/********************** THIS FUNCTION IS LOADED ON CONNECT and DISCONNECT ********************/
/********************THIS METHOD TAKES SECONDS IN CONSIDERATION !! SO WAIT UNTIL A FULL MINUTE PAST DELETE TIME TO TRIGGER********************/

function Order66(){

    $sql="DELETE FROM MyShops 
     WHERE date_of_like_place < (NOW()-INTERVAL 120 MINUTE)";
    $ResultSet=connection::Maj($sql);

}
 /***************************************************************PURGE DB***************************************************************/
 /*************Since i'm using a async approach for this app, better clear the table if we change location*************/
 /*****************BUUUUT i'm keeping my preferred shops until a dislike , then they get deleted by the PURGE function*******************/
function Purge(){

    $sql="DELETE FROM places";
    $ResultSet=connection::Maj($sql);
}




/**************************************************/
/*          Coded By ELATIF NABIL -ZTF6-          */
/**************************************************/


}?>


