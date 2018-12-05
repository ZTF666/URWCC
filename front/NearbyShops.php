<?php
include('../back/Classes/DAO.php');
$user=unserialize($_SESSION['user']);
if(isset($_SESSION['user'])) {}
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
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
	<div id="map" style="display: none;"></div>
		<div>
				
			<div class="main">
				<nav >
					<div >
						<ul>
						<li style="float:right"><a href="../back/Classes/disconnect.php">Logout</a></li>
						<li style="float:right"><a href="PreferredShops.php">Preferred shops</a></li>
						<li style="float:right"><a class="active" href="Nearbyshops.php">Nearby shops</a></li>
						<li style="float:right"><a  href="Index.php">Home</a></li>
						  </ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="container-fluid">
		<div class="row">
		 <?php
		$udao = new DAO();
		$Result=$udao->NearbyShops();
 		foreach ($Result as $data ){

		// Display all the nearby shops around //  
			
		 ?>
 		<div class="col-md-3">
 		<div class="card" >
  		<img src="img/icon_rest.png" alt="John" style="width:100%">
		<h5><?php echo $data->name_place  ?></h5>
		<div>Only <?php echo substr($data->distance_place, 0, -7)  ?>M away from you !</div>
		<div id="outer">
  		<form method="POST" action="../back/Classes/LikeDislike.php">
		<input type="hidden" name="id_place" value="<?php echo $data->id_place ?>">
		<input type="hidden" name="name_place" value="<?php echo $data->name_place ?>">
		<input type="hidden" name="id_user" value="<?php echo $user->id ?>">
  		<div class="inner"><input type="submit" name="URGH" value="Dislike" class="btn btn-danger"></div>
   		<div class="inner"><input type="submit" name="like" value="Like" class="btn btn-success"></div>
   		</form>
    	</div></div></div>
 		<?php } ?>
 		</div>
 		</div>
		
	</body>
</html>
