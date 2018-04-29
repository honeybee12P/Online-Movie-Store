<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/headerStyle.css" />
<title>FlickStar</title>
</head>

<body>
<header>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body class = "grad1">
	<?php
		$connection=mysqli_connect("localhost","root","root");
		mysqli_select_db($connection,"OnlineMovieStore");
		if ($connection->connect_error) {
		    die("Connection failed: " . $connection->connect_error);
		    echo "Connection failed";
		}
	?>
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active" style="height: 550px;">
        <img src="coco.jpeg" style="width:100%;">
        <div class="carousel-caption"> 

     <a href="https://www.youtube.com/watch?v=zNCz4mQzfEI" class="button"><span class="glyphicon glyphicon-play" style="font-size: 40px;color: white;margin-left: 900px;"></span></a>
      </div>
      </div>

      <div class="item" style="height: 550px;">
        <img src="wrinkle.jpeg" style="width:100%;">
        <div class="carousel-caption"> 
        <a href="https://www.youtube.com/watch?v=E4U3TeY2wtM" class="button"><span class="glyphicon glyphicon-play" style="font-size: 40px;color: white;margin-left: 900px;"></span></a>
     
      </div>
      </div>
      <div class="item" style="height: 550px;">
        <img src="lalaland.jpg" style="width:100%;">
        <div class="carousel-caption"> 
       <a href="https://www.youtube.com/watch?v=0pdqf4P9MB8" class="button"><span class="glyphicon glyphicon-play" style="font-size: 40px;color: white;margin-left: 700px;"></span></a>
     
      </div>
      </div>
    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</body>
</header>
</body>
</html>