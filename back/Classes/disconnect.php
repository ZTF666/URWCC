<?php
include('DAO.php');
$udao=new DAO();
$udao->Order66();
$udao->Purge();

SESSION_destroy() ;
header('location:../../front/Login.php');
?>