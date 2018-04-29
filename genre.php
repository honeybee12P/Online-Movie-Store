<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FlickStar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/homeStyle.css" />

</head>

<body class = "grad1">
<?php include 'nav.php' ?>
	<?php
		$genre = $_GET['genre'];
		$connection=mysqli_connect("localhost","root","root");
		mysqli_select_db($connection,"OnlineMovieStore");
		if ($connection->connect_error) {
		    die("Connection failed: " . $connection->connect_error);
		    echo "Connection failed";
		}
	?>


<!--listing section end-->
<div class="footer">© 2018 Copyright: FlickStar</div>
<div id="pagination_data">
</div>

</body>
</html>
<script>
	
	
$(document).ready(function(){  
	var val = "<?php echo $genre ?>";
	 load_data();									
      function load_data(page)  
      {  
      	   $.ajax({  
                url:"genrePagination.php",  
                method:"POST",  
                data:{query:val,page:page},
                success:function(data){ 
                	 //alert(val);
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
                    //alert(data);
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