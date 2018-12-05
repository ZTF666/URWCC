<?php
include('DAO.php');



$username = $_POST['username'];
$pwd =$_POST['password'];

$udao= new DAO();

if(isset($_POST['login-submit'])){ 

    $user=$udao->Authentification($username,$pwd);

    if($user != null)
                    {
                    $_SESSION['user']= serialize($user);
                    header('location:../../front/index.php');
                    $udao->Order66();
                    $udao->Purge();
                    }
    
    else
                    {
                    echo"<script language=\"javascript\">";
        echo "alert('Username or password incorrect !')";
        echo"</script>";
        
        header('location:../../front/login.php');
                    }
    
    
}
else{

    $username = $_POST['username'];
    $pwd =$_POST['password'];
    $email=$_POST['email'];

    $udao->RegisterUser($username,$pwd,$email);

    header('location:../../front/login.php');

}
?>