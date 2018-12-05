<?php
include('../back/Classes/DAO.php');
$user=unserialize($_SESSION['user']);
if(isset($_SESSION['user'])) {

}
else{
	header('location:login.php');
	}
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nearby Shops</title>
		<link rel="stylesheet" type="text/css" href="css/default.css" />
	
	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf99l67Gi1zkOwep0tPsBVG9tOBSPXFuw&libraries=places&callback=initMap" async defer></script>

		<script src="../API/init.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
	</head>
	<body>
	<div id="map" style="display: none;"></div>
	<div class="main">
				<nav >
					<div >
						<ul>
						<li style="float:right"><a href="../back/Classes/disconnect.php">Logout</a></li>
						<li style="float:right"><a href="PreferredShops.php">Preferred shops</a></li>
						<li style="float:right"><a  href="Nearbyshops.php">Nearby shops</a></li>
						<li style="float:right"><a class="active" href="Index.php">Home</a></li>
					
						  </ul>
					</div>
				</nav>
			</div>
				
		<div class="form-thing">
			
	  <form method="POST"  name="data"action="../back/Classes/savePlaces.php">
	  <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
	  <div style="display: none;">
<table id="placess" class="table-dark">


    <tr>
        <th>id</th>
        <th>nom</th>
        <th>lat</th>
		<th>lng</th>
		<th>distance</th>
		
    </tr>
	</table>
</div>

    <input type="submit"  class="save btn btn-success"value="Fetch Nearby shops" style="margin:auto;display:block">
  </form>
</div>
			 
		
		<div class="container-fluid">
		<div class="row">
			
	


</div>
</div>
	
		
	</body>
</html>
