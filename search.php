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

<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/navStyle.css" />
<link rel="stylesheet" href="css/homeStyle.css" />

<style>
	
	.grad1 {
	    height: 760px;
	    background: blue; /* For browsers that do not support gradients */
	    background: linear-gradient(to bottom right,#071021, #0f2242,#112344,#1b335e); /* Standard syntax (must be last) */
	}
	
</style>
</head>

<body class = "grad1">

	<?php include 'nav.php' ?>


<?php
		$button = $_GET ['submit'];
		$search = $_GET ['search']; 
		$criteria = $_GET['criteria'];
		$genre = $criteria;
		
	?>
<div id="pagination_data">

</div>



	

<!--listing section end-->
<div class="footer">© 2018 Copyright: FlickStar</div>
</body>
</html>

<script>
	
	
$(document).ready(function(){  
	var val = "<?php echo $search ?>";
	var val1 ="<?php echo $criteria ?>"
	 load_data();									
      function load_data(page)  
      {  
      	   $.ajax({  
                url:"fullSearchPagination.php",  
                method:"POST",  
                data:{query:val,criteria:val1,page:page},
                success:function(data){ 
                	 // alert(data);
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