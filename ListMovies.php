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
    <title>View courses</title>
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

<?php

$mysqli = new mysqli("localhost","root","root","MOVIE_STORE");
if ($mysqli->connect_error){
        die('Could not connect to database!');
}
$sql="Select * from MOVIE";
$result=mysqli_query($mysqli,$sql);

if($result->num_rows==0)
{
	echo "No movies found";
	exit();
}
if ($result->num_rows > 0) 
			{
				echo "<h3>List of Movies:</h3>";
				echo "<table border='1'>";
				
				echo "<tr>";
				echo "<th><b>Movie ID <b></th>";
				echo "<th><b>Movie name<b></th>";
				echo "<th><b>Year<b></th>";
				echo "<th><b>Description<b></th>";
				echo "<th><b>Duration</b></th>";
				echo "<th><b>Rating</b></th>";
                echo "<th><b>Quantity</b></th>";
                echo "<th><b>Price</b></th>";
                echo "<th><b>In stock</b></th>";
                echo "<th><b>Poster</b></th>";
				echo "</tr>";
							
				
				while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo '<br>';
					if ($row["IS_AVAILABLE"] == 1) {
                        echo "<tr>";
                        echo "<td>" . $row["MOVIEID"] . "</td>";
                        echo "<td>" . $row["TITLE"] . "</td>";
                        echo "<td>" . $row["YEAR"] . "</td>";
                        echo "<td>" . $row["DESCRIPTION"] . "</td>";
                        echo "<td>" . $row["DURATION"] . "</td>";
                        echo "<td >" . $row["RATING"] . "</td>";
                        echo "<td >" . $row["QUANTITY"] . "</td>";
                        echo "<td >" . $row["PRICE"] . "</td>";
                        echo "<td >" . $row["INSTOCK"] . "</td>";
                        echo '<td ><img style ="height: 100px;width: 50px;" src="images/' . $row['IMAGE'] . '"></td >';
                        echo "</tr>";
                    } else {
                        echo "<tr>";
                        echo "<td style='color:#ff1522;'>" . $row["MOVIEID"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["TITLE"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["YEAR"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["DESCRIPTION"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["DURATION"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["RATING"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["QUANTITY"] . "</td>";
                        echo "<td style='color:#ff1522;'>" . $row["PRICE"] . "</td>";
                        echo "<td style='color:#ff1522;'> SOLD OUT </td>";
                        echo '<td ><img style ="height: 100px;width: 50px;" src="images/' . $row['IMAGE'] . '"></td >';
                        #echo '<td style=\'color:red;\'> SOLD OUT</td >';
                        echo "</tr>";
                    }
				
				}
				echo '</table>';
			}
			
?>
    <a href="HomePage.php">Go to homepage</a>
</div>;

</body>
</html>