<!DOCTYPE html>
<html>
	<?php session_start();
		$username = $_SESSION["sess_USER_NAME"];// This contains anshika
		$_SESSION["USER_NAME"]= $_SESSION["sess_USER_NAME"];

	?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/navStyle.css" />
		<script src ="js/my_cart_action.js"></script>
		<title>FlickStar</title>
	</head>


	<header>
		
			
		<body class = "grad1">
			<?php
				$connection=mysqli_connect("localhost","root","root");
				mysqli_select_db($connection,"OnlineMovieStore");
				if ($connection->connect_error) {
				    die("Connection failed: " . $connection->connect_error);
				    echo "Connection failed";
				}
				
				$name = $_SESSION["sess_USER_NAME"];
        		$sql='Select * from `USERS` where `USER_NAME`="'.$name.'"';
       			$result=mysqli_query($connection,$sql);
				$getName =  mysqli_fetch_assoc($result);
				$userType =$getName['USERTYPE'];
   
			?>
			<nav class="navbar navbar-default">
			    <div class="container-fluid">

				    <div class="navbar-header">
				      <!-- <a class="navbar-brand" href="#">FlickStar</a> -->
				    </div>

				    <ul class="nav navbar-nav">
				    	<li style="font-weight: bold;font-size: 20px;"><a href="#">FlickStar</a></li>
				      	<li class="active"><a href="home.php">Home</a></li>
				    </ul>

				    <form class="navbar-form navbar-left" action="search.php">
				    	
				    	<select id="criteria" name="criteria" class="form-control" style="margin-left: 10px;width: 170px">
				      	<option default>Search Criteria</option>
				      	<option value="action">Action</option>
				      	<option value="animation">Animation</option>
				      	<option value="romance">Romance</option>
				      	<option value="horror">Horror</option>
				      	<option value="thriller">Thriller</option>
				      	<option value="sci-fi">Sci-Fi</option>
				      	<option value="Adventure">Adventure</option>
				      	<option value="Drama">Drama</option>
						</select>

				      	<div class="input-group" style="margin-left: 20px;">
				        	<input type="text" class="form-control" placeholder="Search Movie" name="search">
				        	<div class="input-group-btn">
				          		<button class="btn btn-default" type="submit" name="submit">
				            		<i class="glyphicon glyphicon-search"></i>
				          		</button>
				        	</div>
				      	</div>
				      
				    </form>
					<div class ="navbar-header pull-right">
						<p class = "navbar-text"> <?php echo "Hey ".$_SESSION["sess_USER_NAME"]. "!"?>
						<?php if($userType === "admin") { ?> 
							<a href="addMovie.php" target="_blank"  class="btn btn-default btn-sm"  style ="margin-left: 10px;"><span class="glyphicon glyphicon-plus"></span> Add Movie </a>
						<?php } ?>
						<button id ="order" class ="button" style ="margin-right: 10px">Order Details</button>
						<button id = "myCart" type="button"  style=" margin-left: 20px; margin-right:20px;"> <i class="glyphicon glyphicon-shopping-cart gi-5x"></i></button>
						<a href="login.html"  class="btn btn-default btn-sm" ><i class="glyphicon glyphicon-log-out navbar-link"></i></a></p>
					</div>  
				</div>
			</nav>
		</body>
	</header>
	</html>