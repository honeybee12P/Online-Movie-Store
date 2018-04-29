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
<link rel="stylesheet" href="css/homeStyle.css" />
<title>FlickStar</title>
</head>
<body>
<header>


<body class = "grad1">
<?php include 'nav.php';?>
<?php include 'header.php';?>


<!--1st image block start -->
<!--1st image block end-->

<br><h4 style=" color:white;font-size: 22px;
		font-weight: bold;">New Releases</h4>
<div id="pagination_data">
</div>
</section>
<!--listing section end-->


<br><h4 style="margin-top: 250px; color:white;font-size: 22px;
		font-weight: bold;">Top Releases</h4>
<div id="pagination_data1">
</div>
</section>
<!--listing section end-->

	<br><h4 style="margin-top: 250px; color:white;font-size: 22px;
		font-weight: bold;">Genre</h4>
	<table>
	<tr>
	
	<td >
	  	<div class="card">
	    <div class="card-body">
	     
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'animation';?>'">Animation</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'action';?>'">Action</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td >
		<div class="card">
	    <div class="card-body">
	      <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'thriller';?>'">Thriller</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td >
		<div class="card">
	    <div class="card-body">
	      <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'horror';?>'">Horror</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'romance';?>'">Romance</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	     <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'sci-fi';?>'">Sci-Fi</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td>
		<div class="card">
	    <div class="card-body">
	      <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'adventure';?>'">Adventure</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	<td><div class="card">
	    <div class="card-body">
	      <!-- <form action = "/genre.php"> -->
	    	<button class = "button1" onclick="window.location.href='genre.php?genre=<?php echo 'drama';?>'">Drama</button>
	    <!-- </form> -->
	    </div>
	  </div>
	</td>
	</tr>
	</table>
	
</body>
<!-- <div class="footer">© 2018 Copyright: FlickStar</div> -->
</html>

<script>  
 $(document).ready(function(){  
      load_data();  
      load_data1();
      function load_data(page)  
      {  
      	   $.ajax({  
                url:"pagination_php.php",  
                method:"POST",  
                data:{page:page},
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }
       function load_data1(page)  
      {  
      	   $.ajax({  
                url:"pagination_php1.php",  
                method:"POST",  
                data:{page:page},
                success:function(data){  
                     $('#pagination_data1').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link1', function(){  
           var page = $(this).attr("id");  
           load_data1(page);  
      });
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  