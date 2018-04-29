<?php 		
			session_start();
			// if (!isset($_SESSION['sess_USER_NAME'])) {
			// 	exit(header("Location:onlineLogin.php"));
			// }
			$username = $_SESSION["sess_USER_NAME"];// This contains anshika
			$_SESSION["USER_NAME"]= $_SESSION["sess_USER_NAME"];

	?>
<!DOCTYPE html>
<html>
	
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FlickStar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/style.css" />
<script src="js/add_to_cart.js"></script>
<script src ="js/my_cart_action.js"></script>
<script src ="js/soft_delete.js"></script>
<style>
	.grad1 {
	    height: 760px;
	    background: blue; /* For browsers that do not support gradients */
	    background: linear-gradient(to bottom right,#071021, #0f2242,#112344,#1b335e); /* Standard syntax (must be last) */
	}
	h3 {
		font-size: 40px;
		font-weight: bold;
		padding-left:10px; 
		color:white;
	}
	h4 {
		font-size: 18px;
		font-weight: bold;
		padding-left:10px;
		color:white;
	}
	h5 {
		font-size: 16px;
		font-weight: bold;
		padding-left:10px;
		color:#35bcce;
	}
	.navbar .navbar-default .container-fluid{
			  background-color: #071021;
			  overflow: hidden;
			}
			.navbar { 
				height: 50px; 
			}
	.footer {
			position: absolute;
			right: 0;
			bottom: 0;
			left: 0;
			padding: 1rem;
			background: linear-gradient(to bottom right, #acb0b7, white);
			text-align: center;
}
</style>
</head>

<body class = "grad1">

	<?php
		$submit_id = $_GET['id'];
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
					<button id = "myCart" type="button"  style=" margin-left: 20px; margin-right:20px;"> <i class="glyphicon glyphicon-shopping-cart gi-5x"></i></button>
					<a href="login.html" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-log-out navbar-link"></i></a></p>
			</div>  
					
		</div>
	</nav>
	<table style="width:100%;margin-left: 40px;"><tr>
	<?php
		$query1 = mysqli_query($connection,"select * from actor,Actor_Movie,MOVIE where Actor_Movie.movieid = MOVIE.MOVIEID and Actor.actorid = Actor_Movie.actorid and MOVIE.movieid = $submit_id");

		$query = mysqli_query($connection,"select * from movie where movieid = $submit_id");
		while ($top =  mysqli_fetch_assoc($query)) 	{
		?>
			<td style="padding-left: 20px;"><h3><?php echo $top['TITLE']?></h3>
				<h4 style="padding-top: 10px;"> Plot</h4>	
				<h5 style ="text-align: left"><?php echo $top['DESCRIPTION']?></h5>
				<h4>Duration</h4>
				<h5><?php echo $top['DURATION']?></h5>
				<h4>IMDB Rating</h4>
				<h5><?php echo $top['RATING']?> / 10</h5>
				<h4>Year</h4>
				<h5><?php echo $top['YEAR']?></h5>
				<h4>Genre</h4>
				<h5><?php echo $top['GENRE']?></h5>
				<?php
						$_SESSION['TITLE'] = $top['TITLE'];
						$_SESSION['DESCRIPTION']=  $top['DESCRIPTION'];
						$_SESSION ['DURATION']= $top['DURATION'];
						$_SESSION ['RATING']=  $top['RATING'];
						$_SESSION['YEAR'] = $top['YEAR'];
						$_SESSION ['GENRE'] = $top['GENRE'];
                        $_SESSION['QUANTITY'] =$top['QUANTITY'];
                        $_SESSION['PRICE'] =$top['PRICE'];
						$_SESSION['TRAILER'] =$top['TRAILER'];
						$_SESSION['IS_DELETED'] =$top['IS_DELETED'];
						$_SESSION['Director'] = $top['Director'];

                ?>
				<h4>Director</h4>
				<h5><?php echo $top['Director'] ?></h5>
				
				<h4>Cast</h4>
				<?php 
				while ($top1 =  mysqli_fetch_assoc($query1)) 	{
				?>
				<h5><?php echo $top1['actor_name']?></h5>
				<?php 
				$temp = $top['TRAILER'];
				}
				?>

			</td>
			<td style="padding-left: 170px;">
				<table>
					<tr>
						<?php
							echo '<img src="'.$top['IMAGE'].'" alt="header img" style="width:90%;height: 330px;padding-top: 50px;">';
						?>
					</tr><br><br><br>
					
					<tr>
						
						<?php 
						$deleteFlag = $_SESSION['IS_DELETED'];
						if($deleteFlag == 0) { 
						?>
						<td style="padding-left: 0px; padding-right:0px; padding-bottom: 25px;">
								<label for="qty" style="color: white;">Quantity</label>
							
								<select name="qty" class="form-control" id="qty">
									<?php 
										for ( $x = 1; $x<= $_SESSION['QUANTITY']; $x++){
										echo "<option value=".$x.">" . $x . "</option>";}
									?> 
								</select>
								
								<td style="padding-left: 50px;"><button id ="cartBtn" class="btn btn-default btn-sm" style="background: linear-gradient(to bottom right, #acb0b7, white);"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
								</td>
						</td>
						<?php } else {
							echo "<td style='color:white;'><h5>*Movie is currently Unavailable.</h5></td>";
						}  ?>
						<td style="padding-left: 50px;"><button type="button" class="btn btn-default btn-sm" style="background: linear-gradient(to bottom right, #acb0b7, white);"><a href = "<?php echo $temp; ?>" target="_blank"><span class="glyphicon glyphicon-play"></span> Watch Trailer</a></button></td>
						
						<?php if($userType === "admin") {
                            $_SESSION["MovieTitle"] = $top['TITLE'];
                            ?>
                      
                        <td style="padding-left: 10px;"><a href="UpdateMovieInterface.php" target="_blank"><button type="button" class="btn btn-default btn-sm" style="background: linear-gradient(to bottom right, #acb0b7, white);"><span class="glyphicon glyphicon-play"></span> Update Movie
                            </button></a>
                        </td>
                        <td style="padding-left: 10px;">
                                <button name="delete" id="delete" value="<?php echo $_SESSION["MovieTitle"];?>" class="btn btn-default btn-sm">Delete Movie</button>

<!--                         <a href="DeleteMovieModel.php" target="_blank"><button type="button" class="btn btn-default btn-sm" style="background: linear-gradient(to bottom right, #acb0b7, white);"><span class="glyphicon glyphicon-play"></span> Delete Movie</button></a>-->
                        </td>
                        <?php } ?>

					</tr>
				</table>
			</td>
		<?php }
		 
		?>	
		</tr></table>
		<!-- <footer style="background: linear-gradient(to bottom right, #acb0b7, white);height: 50px;margin-top: 251px;">
  <p style="margin-left: 600px;">© 2018 Copyright: FlickStar</p>
</footer> -->
<div class="footer">© 2018 Copyright: FlickStar</div>
</body>
</html>