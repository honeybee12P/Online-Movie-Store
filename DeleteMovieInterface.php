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
    <title>Modify course</title>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">  
</script>
<style>
	td {border-right:none;border-left:none;border-bottom:none;border-top:none;padding:1px;}
        table{ border-right:none;border-left:none;border-bottom:none;border-top:none;border-spacing:1px;}
</style>
<script>
    $(document).ready(function(){
        $(document).on("click",".button",function(){
            var clickBtnValue = $(this).val();
            alert(clickBtnValue);
            //var movieid=$("#movieid").val();
            var movietitle=$("#movietitle").val();
            // var movieyear=$("#movieyear").val();
            // var description=$("#description").val();
            // var duration=$("#duration").val();
            // var rating=$("#rating").val();
            // var quantity=$("#quantity").val();
            // var price=$("#price").val();
            // var instock=$("#instock").val();
            // var imagefile = $("#imagefile").val();

            var data = {
                'action': clickBtnValue,
                'movietitle': movietitle
            };


            switch(clickBtnValue)
            {
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
                url: "MovieModification.php",
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
                },
            });
    }
    function Delete(data)
    {
        $.ajax(
            {
                url: "DeleteMovieModel.php",
                datatype:"json",
                type:"POST",
                async: false,
                data:data,
                success: function(data){
                    alert("Movie deleted succesfully");
                    document.getElementById("DeleteMovie").reset();



                },
                error: function(data)
                {
                    alert("Error in adding a new movie");
                },
            });
    }
    function update(data)
    {
        $.ajax(
            {
                url: "MovieModification.php",
                datatype:"json",
                type:"POST",
                async: false,
                data:data,
                success: function(data){
                    alert("Movie updated succesfully");
                    document.getElementById("DeleteMovie").reset();



                },
                error: function(data)
                {
                    alert("Error in adding a new movie");
                },
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
        <li><h1 style="position: fixed;left:100px;text-align:center;"><strong><strong>Online Movie Store</strong></strong></H1></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="HomePage.php">Home</a></li>
		<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<img src="images/avatar.jpeg" id="bg" alt="">
<div id="container3">
<h3><b>Choose the movie to delete</b></h3>
<form name="DeleteMovie" id="DeleteMovie">

<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$conn = new mysqli($servername, $username, $password, "OnlineMovieStore");
	$sql="select TITLE from MOVIE";
	$result=$conn->query($sql);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	else
	{
		echo "<center><table>";
			echo"<tr>"	;	
			echo"<td>"	;		
					
		echo "Movie TITLE <font color='red'>*</font>:";
		echo"</td>"	;	
		echo"<td>"	;			
		echo '<select style="width: 340px;color:#000000;" name="movietitle" id="movietitle">';
		if ($result->num_rows > 0) 
			{
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						echo "<option value='".$row["TITLE"]."'>".$row["TITLE"]."</option>";

					}
				
			}				
		
		else
			{
				echo "no movies";
			}				
				
		
			  
			echo '</select>   </br> </br>';
	}
	
		?>
	</td>
	</tr>
	


		

				</table>
				<br>
				<table>
				<tr>

			<td><input id="buttons" type="button" class="button" style="width: 100px;"name="delete" value="Delete"></td>
			<tr><td><br><br><a href="HomePage.php" style="position:absolute;right:150px;">Go back to homepage</a></td></tr>
				
		</table></center>
<div id="result"> </div>


</form>
</div>
</body>
</html>