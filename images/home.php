<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/style.css" />
<title>FlickStar</title>
</head>

<body>
<header>




<style>
	.mySlides {
		display:none
	}
	.w3-left, .w3-right, .w3-badge {
		cursor:pointer
	}
	.w3-badge {
		height:13px;
		width:13px;
		padding:0
	}
	.navbar { 
		height: 50px; 
	}

	.mySlides{
	  height: 500px;
	}
	.shadow {
	  box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
	  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
	}
	.grad1 {
	    height: 1450px;
	    background: blue; /* For browsers that do not support gradients */
	    background: linear-gradient(to bottom right,#071021, #0f2242,#112344,#1b335e); /* Standard syntax (must be last) */
	}
	.navbar .navbar-default .container-fluid{
	  background-color: #071021;
	  overflow: hidden;
	}
	.genres {
	  width: 150px;
	  height: 100px;
	  margin: 24px 0;
	  padding: 16px
	}
	div.card {
	    width: 150px;
	    height: 110px;
	    box-shadow: 1px 4px 8px #c5c8cc;
	    text-align: center;
	    background: linear-gradient(to bottom right, #acb0b7, white);
	    text-decoration-color: #071021;
	}
	table {
	  margin-left: 15px;

	}
	td {
	  padding:0 3px 0 3px;

	}
	h4{
		font-size: 22px;
		font-weight: bold;
		color:white;
		margin-left: 20px;
	}
	h5 {
		font-size: 20px;
		font-weight: bold;
		padding-top:50px;
		color:white;
	}
	#image_div .img_wrapper:hover img
	{
	 -webkit-filter: blur(1.7px);
	}
	#image_div .img_wrapper span
	{
	 display:none;
	 position:absolute;
	 top:40px;
	 left:30px;
	}
	#image_div .img_wrapper:hover span
	{
	 display:table-cell;
	}
	#image_div .img_wrapper span input[type="button"]
	{
	 width:120px;
	 height:40px;
	 background-color:Transparent;
	 /*border:;*/
	 color:white;
	 font-weight:bold;
	 font-size:30px;
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
<body class = "grad1">
	<?php
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
	    	<li style="font-weight: bold;font-size: 20px;"><a href="#">FlickStar</a></li>
	      	<li class="active"><a href="#">Home</a></li>
	    </ul>
	    <form class="navbar-form navbar-left" action="/search.php">
	    	<select id="genre" name="genre" class="form-control" style="margin-left: 10px;width: 170px">
	      	<option default>Select Genre</option>
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
	    
	    <i class="glyphicon glyphicon-shopping-cart gi-5x" style="margin-top: 12px;margin-left: 700px;font-size: 20px;"></i>
	      
	          
	    <i class="glyphicon glyphicon-log-out" style="margin-top: 12px;margin-left: 30px;font-size: 20px;"></i>
	     
	  </div>
	</nav>
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
       <a href="https://www.youtube.com/watch?v=0pdqf4P9MB8" class="button"><span class="glyphicon glyphicon-play" style="font-size: 40px;color: white;margin-left: 900px;"></span></a>
     
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
<br><h4>New Releases</h4>
<div class="col-sm-9" style="margin-left: 363px;">
<div class="row">
<div class="col-sm-3 pull-left">
</div>
<div class="col-sm-9 pull-right text-right">
<div class="list-pager">
<nav class="pagination">
  <ul class="pagination">
    <?php
	$count=1;
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}
	if($page==1)
	{
		
 ?>
	<li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
	<?php
	}
	else
	{
		?>
	<li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>	
	<?php
	}
	?>
	
	<?php
	$q1=mysqli_query($connection,"select * from movie where year>=2017");
	$cs=mysqli_num_rows($q1);
	if($cs%3==0)
	{	
	$cs=$cs/3;
	}
	else
	{
		$cs=$cs/3+1;
	}
	while($count<=$cs)
	{
    if($count==$page)
	{		
	?>    
     <li class="page-item active">
      <a class="page-link" href="home.php?page=<?php echo $count?>"><?php echo $count?><span class="sr-only">(current)</span></a>
    </li>
    <?php 
	}
	else
	{
		?>
    <li class="page-item"><a class="page-link" href="home.php?page=<?php echo $count?>"><?php echo $count?></a></li>
	<?php
	}
	$count++;
	}
	if($page==$count-1)
	{
	?>	
	
	<li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
	<?php
	}
	else
	{
	?>	
	<li class="page-item">
      <a class="page-link" href="home.php?page=<?php echo($page+1);?>" aria-label="Next">
    	<span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
	<?php
	}
	?>
  </ul>
</nav>

            </div>
            </div>
            </div>
</div>

</div>
<!--1st image block start -->
<?php

$per_page=3;
if(isset($_GET['page']))
      {
		  $page=$_GET['page'];
	  }
else
	  {
		  $page=1;
	  }
	  $start_from = ($page-1) * $per_page;
$q2 = mysqli_query($connection,"select * from movie where year>=2017 LIMIT $start_from,$per_page");	
// echo "<pre>";print_r($q2);exit; 
	
	 while ($top =  mysqli_fetch_assoc($q2))
	{
 
	 ?>		

<div class="col-sm-4 cake-type list-cake" style = "margin-top: 12px;">
<div class="image-section" style="height: 180px;">
	<div id="image_div"><p class="img_wrapper">
	<?php echo '<img src="'.$top['IMAGE'].'" alt="header img" style="width:100%">'?>
	<button onclick="window.location.href=''" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-play" style="font-size: 40px; color:white;margin-top: 20px;margin-left: 120px;"></span> 
    </button>
    <!-- <form action='search.php' method='GET'> -->
    <button onclick="window.location.href='info.php?id=<?php echo $top['MOVIEID'];?>'" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-info-sign" style="font-size: 40px; color: white;margin-top: 20px;margin-left: 180px;"></span>
    </button>
<!-- </form> -->
</p></div>
	<div class="hover-div">	
	</div>
</div>

</div>
<?php
 }
 
?>	
<!--1st image block end-->
</div>
</div>
</div>
</section>
<!--listing section end-->


<br><h4 style="margin-top: 250px">Top Releases</h4>
<div class="col-sm-9" style="margin-left: 363px;">
<div class="row">
<div class="col-sm-3 pull-left">
</div>
<div class="col-sm-9 pull-right text-right">
<div class="list-pager">
<nav class="pagination">
  <ul class="pagination">
    <?php
	$count=1;
	if(isset($_GET['page1']))
	{
		$page1=$_GET['page1'];
	}
	else
	{
		$page1=1;
	}
	if($page1==1)
	{
		
 ?>
	<li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
	<?php
	}
	else
	{
		?>
	<li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>	
	<?php
	}
	?>
	
	<?php
	$q1=mysqli_query($connection,"select * from movie order by rating");
	$cs=mysqli_num_rows($q1);
	if($cs%3==0)
	{	
	$cs=$cs/3;
	}
	else
	{
		$cs=$cs/3+1;
	}
	while($count<=$cs)
	{
    if($count==$page1)
	{		
	?>    
     <li class="page-item active">
      <a class="page-link" href="home.php?page1=<?php echo $count?>"><?php echo $count?><span class="sr-only">(current)</span></a>
    </li>
    <?php 
	}
	else
	{
		?>
    <li class="page-item"><a class="page-link" href="home.php?page1=<?php echo $count?>"><?php echo $count?></a></li>
	<?php
	}
	$count++;
	}
	if($page1==$count-1)
	{
	?>	
	
	<li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
	<?php
	}
	else
	{
	?>	
	<li class="page-item">
      <a class="page-link" href="home.php?page1=<?php echo($page1+1);?>" aria-label="Next">
    	<span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
	<?php
	}
	?>
  </ul>
</nav>

            </div>
            </div>
            </div>
</div>

</div>
<!--1st image block start -->
<?php

$per_page=3;
if(isset($_GET['page1']))
      {
		  $page1=$_GET['page1'];
	  }
else
	  {
		  $page1=1;
	  }
	  $start_from = ($page1-1) * $per_page;
$q2 = mysqli_query($connection,"select * from movie order by rating LIMIT $start_from,$per_page");	
// echo "<pre>";print_r($q2);exit; 
	
	 while ($top =  mysqli_fetch_assoc($q2))
	{
 
	 ?>		

<div class="col-sm-4 cake-type list-cake" style = "margin-top: 12px;">
<!-- <div class="wedding-cake img-thumbnail"> -->
<!-- <div class="product-icon"><img src="img/cupcake-icon1.png" /></div> -->
<div class="image-section" style="height: 180px;"><?php echo '<img src="'.$top['IMAGE'].'" alt="header img" style="width:100%">'?>
	<div class="hover-div">	
	</div>
</div>
<!-- <h4><?php echo $top['TITLE']?></h4> -->
<!-- <div class="btn-block"> -->
<!-- <a href="#" class="price pull-left text-center"><?php echo ("USD ".$top['PRICE'])?></a> -->
<!-- <button onclick="window.location.href='order.php?item_id=<?php echo $top['MOVIEID'];?>'"><a href="#" class="order pull-right text-center">Order it now</a></button> -->
<!-- </div> -->
</div>
<!-- </div> -->
<?php
 }
 
?>	
<!--1st image block end-->
</div>
</div>
</div>
</section>
<!--listing section end-->

	<br><h4 style="margin-top: 250px">Genre</h4>
	<table>
	<tr>
	<td>
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Comedy</h5>
	    </div>
	  </div>
	</td>
	<td >
	  	<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Animation</h5>
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Action</h5>
	    </div>
	  </div>
	</td>
	<td >
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Thriller</h5>
	    </div>
	  </div>
	</td>
	<td >
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Horror</h5>
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Romance</h5>
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Sci-Fi</h5>
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Adventure</h5>
	    </div>
	  </div>
	</td>
	<td><div class="card">
	    <div class="card-body">
	      <h5 class="card-title">Drama</h5>
	    </div>
	  </div>
	</td>
	</tr>
	</table>
	<!-- <div class="footer">© 2018 Copyright: FlickStar</div> -->
</body>
</html>