

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
		<link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/style.css" />
        <title>FlickStar</title>
        <style> {border-right:none;border-left:none;border-bottom:none;border-top:none;padding:2px}</style>
        <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                var director = $("#director").val();

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
                    'trailer' : trailer,
                    'director' : director
                };
            
            
                switch(clickBtnValue)
                {
                    case 'Insert':
                        insert(data); 
                        break;
                }
            }); 
        });
    function insert(data)
    {
        $.ajax({
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
    </script>

	</head>
	<header>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            #MovieModification{
                color: white;
            }

            .addMovTab input{ 
                color: #1b335e;}
            .addMovTab textarea { 
                color: #1b335e;}
            .addMovTab select{ 
                color: #1b335e;}
            #MovieModification #imagefile{
                color: white;
            }
			.grad1 {
			    height: 100%;
			    padding: 0px;
			    margin :0px;
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
			.button1{
				background-color: Transparent;
				color:white;
				font-size: 20px;
				font-weight: bold;
				padding-top: 45px;
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
				      	<li class="active"><a href="home.php">Home</a></li>
                    </ul>
				    <div class ="navbar-header pull-right">
                        <p class = "navbar-text"> <?php echo "Hey ".$_SESSION["USER_NAME"]. "!"?>  &nbsp;&nbsp;
                        <a href ="login.html"><i class="glyphicon glyphicon-log-out navbar-link"></i></a></p>
                        <!-- <i class="glyphicon glyphicon-shopping-cart gi-5x" style="margin-top: 12px;margin-left: 300px;font-size: 20px;"></i>         
                        <i class="glyphicon glyphicon-log-out" style="margin-top: 12px;margin-left: 30px;font-size: 20px;"></i> -->
		            </div>  
				</div>
            </nav>
            <form name="MovieModification" id="MovieModification" enctype="multipart/form-data">
                <center>
                    <h4> Add Movie</h4>
                    <table class= "addMovTab" style='border-right:none;border-left:none;border-bottom:none;border-top:none' cellspacing="1" cellpadding="1">
                        <div class ="form-group"><tr><td> Movie ID<font color="red">*</font></td><td><input class = "form-control" name="movieid" style="width: 320px;"  type="text" id="movieid"></input></td></tr> </div>
                        <div class ="form-group"><tr><td>Movie Title<font color="red">*</font></td> <td><input  class = "form-control" name="movietitle" id="movietitle" style="width: 320px;" type="text" value=""</input></td></tr></div>
                        <div class ="form-group"><tr><td>Movie Year<font color="red">*</font></td> <td><input name="movieyear" id="movieyear" style="width: 320px;" type="text" value=""</input></td></tr></div>
                        <div class ="form-group"><tr><td>Description</td><td><textarea class = "form-control" id="description" rows="10" cols="45"></textarea></td></tr></div>
                        <div class ="form-group"><tr><td>Duration<font color="red">*</font></td><td><input class = "form-control" name="duration" id="duration" type="text" style="width: 320px;" placeholder="HH:MM:SS"/></td> </tr></div>
                        <div class ="form-group"><tr><td>Genre<font color="red">*</font></td><td><input class = "form-control" name="genre" id="genre" type="text" style="width: 320px;" /></td> </tr></div>
                        <div class ="form-group"><tr><td>IMDB Rating<font color="red">*</font></td><td>
                        <input class = "form-control" name="rating" id="rating" type="text" style="width: 320px;" />
                            <!-- <select class = "form-control" id ="rating" name="rating">
                                <option value="Not Selected">Not Selected</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> --></td>
                        </tr></div>
                        <div class ="form-group"><tr><td>Quantity<font color="red">*</font></td><td><input class = "form-control" name="quantity" id="quantity" type="text"  style="width: 320px;" value=" "></td></tr></div>
                        <div class ="form-group"><tr><td>Price<font color="red">*</font></td><td><input class = "form-control" name="price" id="price" type="text"  style="width: 320px;" value=" "></td></tr></div>
                        <div class ="form-group"><tr><td>Trailer Link<font color="red">*</font></td><td><input class = "form-control" name="trailer" id="trailer" type="text"  style="width: 320px;" value=" "></td> </tr></div>

                        <div class ="form-group"><tr><td>Movie Director<font color="red">*</font></td><td><input class = "form-control" name="director" id="director" type="text"  style="width: 320px;" value=" "></td> </tr></div>
                        
                        <!-- <div class ="form-group"><tr><td>In Stock<font color="red">*</font></td><td>
                            <select class = "form-control" id ="instock">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select></td>
                        </tr></div> -->
                        <div class ="form-group"><tr><td>Movie Poster<font color="red">*</font></td><td><input class ="form-control-file" type="file" name="imagefile" id="imagefile"></td> </tr></div>
                        <div class ="form-group"><tr><td align="center" colspan="2"><input id="buttons" type="button" class="button" style="width: 100px;" name="insert" value="Insert"></td></tr><tr></div>

                    </table>
                </center>
            </form>
        </body>
    </header>
</html>