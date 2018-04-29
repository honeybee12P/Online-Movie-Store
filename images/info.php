<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/style.css" /> -->
<title>FlickStar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/style.css" />
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
	?>
<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <!-- <a class="navbar-brand" href="#">FlickStar</a> -->
	    </div>
	    <ul class="nav navbar-nav">
	    	<li><a href="#">FlickStar</a></li>
	      <li class="active"><a href="#">Home</a></li>
	    </ul>
	    <form class="navbar-form navbar-left" action="/action_page.php">
	      <div class="input-group">
	        <input type="text" class="form-control" placeholder="Search Movie" name="search">
	        <div class="input-group-btn">
	          <button class="btn btn-default" type="submit">
	            <i class="glyphicon glyphicon-search"></i>
	          </button>
	        </div>
	      </div>
	    </form>
	    
	    <i class="glyphicon glyphicon-shopping-cart gi-5x" style="margin-top: 12px;margin-left: 920px;font-size: 20px;"></i>
	      
	          
	    <i class="glyphicon glyphicon-log-out" style="margin-top: 12px;margin-left: 50px;font-size: 20px;"></i>
	     
	  </div>
	</nav><table style="width:100%;margin-left: 40px;"><tr>
	<?php
	
		$query = mysqli_query($connection,"select * from movie where movieid = $submit_id");
		while ($top =  mysqli_fetch_assoc($query)) 	{
		?>
			<td style="padding-left: 20px;"><h3><?php echo $top['TITLE']?></h3>
				<h4 style="padding-top: 10px;"> Plot</h4>	
				<h5><?php echo $top['DESCRIPTION']?></h5>
				<h4>Duration</h4>
				<h5><?php echo $top['DURATION']?></h5>
				<h4>IMDB Rating</h4>
				<h5><?php echo $top['RATING']?> / 10</h5>
				<h4>Year</h4>
				<h5><?php echo $top['YEAR']?></h5>
				<h4>Genre</h4>
				<h5><?php echo $top['GENRE']?></h5>
				<h4>Cast</h4>
			</td>
			<td style="padding-left: 170px;">
				<table>
					<tr>
						<?php
							echo '<img src="'.$top['IMAGE'].'" alt="header img" style="width:90%;height: 330px;padding-top: 50px;">';
						?>
					</tr><br><br><br>
					<tr>
						<td style="padding-left: 100px;"><button type="button" class="btn btn-default btn-sm" style="background: linear-gradient(to bottom right, #acb0b7, white);"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
        					</button>
        				</td>
						<td style="padding-left: 120px;"><button type="button" class="btn btn-default btn-sm" style="background: linear-gradient(to bottom right, #acb0b7, white);"><span class="glyphicon glyphicon-play"></span> Watch Trailer
        					</button>
        				</td>
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