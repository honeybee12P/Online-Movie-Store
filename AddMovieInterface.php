<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/validateRegistration.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/valid.css">
	<link rel="stylesheet" href="css/admin.css">
    <title>Add Movie</title>
<style>
	td {border-right:none;border-left:none;border-bottom:none;border-top:none;padding:2px}
</style>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">  
</script>
<script>
$(document).ready(function(){
    $(document).on("click",".button",function(){
        var clickBtnValue = $(this).val();
		
		var movieid=$("#movieid").val();
		var movietitle=$("#movietitle").val();
		
		var movieyear=$("#movieyear").val();
		var description=$("#description").val();
		var duration=$("#duration").val();
		var rating=$("#rating").val();
        var genre=$("#genre").val();
        var quantity=$("#quantity").val();
        var price=$("#price").val();
        var instock=$("#instock").val();
        var imagefile = $("#imagefile").val();
        var trailer = $("#trailer").val();

        var data = {
            'action': clickBtnValue,
            'movieid': movieid,
            'movietitle': movietitle,
            'movieyear': movieyear,
            'description': description,
            'duration': duration,
            'rating': rating,
            'genre': genre,
            'quantity': quantity,
            'price': price,
            'instock': instock,
            'imagefile' : imagefile,
            'trailer' : trailer
        };
	   
	   
	   switch(clickBtnValue)
	   {
		  case 'Search':
            search(data);
            break;
        case 'Update':
			update(data);
            break;
		 case 'Delete':
            Delete(data);
            break;
		case 'Insert':
            insert(data); 
			break;
	   }

    }); 
	

});
function insert(data)
{
	 $.ajax(
				{
					url: "AddMovieModel.php",
					datatype:"json",
					type:"POST",
                    async: false,
					data:data,
					success: function(data){
                        alert("Movie added succesfully");
                        document.getElementById("MovieModification").reset();

						

					},
					error: function(data)
					{
					alert("Error in adding a new movie");
					}
				});
}
function Delete(data)
{
	 $.ajax(
				{
					url: "MovieModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(response){
						
						alert("action performed successfully"+response);
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
}
function update(data)
{
	 $.ajax(
				{
					url: "MovieModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(response){
						
						alert("action performed successfully"+response);
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
}
function search(data)
{
	 $.ajax(
				{
					url: "MovieModification.php",
					datatype:"json",
					type:"POST",
					data:data,
					success: function(result){
						var evalData = JSON.parse(result);
						evalData.forEach(function(element){
							$('#coursename').val(element.course_name);
							$('#description').val(element.course_description);
							$('#deptid').val(element.dept_id);
							$('#prerequisites').val(element.prerequiste);
							$('#level').val(element.level);
							
					});
						//alert("action performed successfully"+result);
				    },
					error: function(error)
					{
					alert(error);
					}
					
				});
	
}

</script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-center">
        <li><h1 style="position: fixed;left:100px;text-align:center;"><strong><strong>Online Movie Store</strong></strong></h1></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="HomePage.php">Home</a></li>
		<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<img src="images/colors.jpg" id="bg" alt="">
<div id="container3">
<h3><b>Add Movie</b></h3>
<br>
<form name="MovieModification" id="MovieModification" enctype="multipart/form-data" src="MovieModification.php">

		<center>
		<table style='border-right:none;border-left:none;border-bottom:none;border-top:none' cellspacing="1" cellpadding="1">
				<tr>
					<td>
					Movie ID<font color="red">*</font></td><td><input name="movieid" style="width: 320px;"  type="text" id="movieid"></input>
					</td>

				</tr>
				<tr>
				<td>Movie Title<font color="red">*</font></td> <td><input name="movietitle" id="movietitle" style="width: 320px;" type="text" value=""</input></td>
				</tr>
                <tr>
                    <td>Movie Year<font color="red">*</font></td> <td><input name="movieyear" id="movieyear" style="width: 320px;" type="text" value=""</input></td>
                </tr>
				<tr>
				<td>Description</td><td><textarea id="description" rows="10" cols="45"></textarea></td>
				</tr>
				<tr>
				<td>Duration<font color="red">*</font></td><td><input name="duration" id="duration" type="text" style="width: 320px;" placeholder="HH:MM:SS"/></td>
				</tr>
                <tr>
                    <td>Genre<font color="red">*</font></td><td><input name="genre" id="genre" type="text" style="width: 320px;" /></td>
                </tr>
				<tr>
				<td>IMDB Rating<font color="red">*</font></td><td>
                        <select id ="rating" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
				</tr>
				<tr>
				<td>Quantity<font color="red">*</font></td><td><input name="quantity" id="quantity" type="text"  style="width: 320px;" value=" "></td>
				</tr>
            <tr>
                <td>Price<font color="red">*</font></td><td><input name="price" id="price" type="text"  style="width: 320px;" value=" "></td>
            </tr>
            <tr>
                <td>Trailer Link<font color="red">*</font></td><td><input name="trailer" id="trailer" type="text"  style="width: 320px;" value=" "></td>
            </tr>
            <tr>
                <td>In Stock<font color="red">*</font></td><td>
                <select id ="instock">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select></td>
            </tr>
            <tr>
                <td>Movie Poster<font color="red">*</font></td><td><input type="file" name="imagefile" id="imagefile"></td>
            </tr>
				<tr>
				
				<td align="center" colspan="2"><input id="buttons" type="button" class="button" style="width: 100px;" name="insert" value="Insert"></td></tr><tr>
<td align="right" colspan="2"><a href="HomePage.php">Go to homepage</a></td></tr>
				
		</table>
	</center>
<div id="result"> </div>



</form>
</div>
</body>
</html>