<?php 

$con = mysqli_connect("localhost","root","root","onlinemoviestore");




if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Insert':
            $movieid = mysqli_real_escape_string($con, $_POST['movieid']);
			$movietitle= mysqli_real_escape_string($con, $_POST['movietitle']);
			$movieyear= mysqli_real_escape_string($con, $_POST['movieyear']);
			$description= mysqli_real_escape_string($con, $_POST['description']);
			$duration= mysqli_real_escape_string($con, $_POST['duration']);
            $rating = mysqli_real_escape_string($con, $_POST['rating']);
            $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
            $price = mysqli_real_escape_string($con, $_POST['price']);
            $genre = mysqli_real_escape_string($con, $_POST['genre']);
            //$instock = mysqli_real_escape_string($con, $_POST['instock']);
            $trailer = mysqli_real_escape_string($con, $_POST['trailer']);
            $director = mysqli_real_escape_string($con, $_POST['director']);
            $imagefile = mysqli_real_escape_string($con, $_POST['imagefile']);
            $imagefile = str_replace('\\', '/', $imagefile);
            $imagefile = basename($imagefile);
            insert($con,$movieid,$movietitle,$movieyear,$description, $duration,$rating, $quantity, $price,$imagefile, $genre, $trailer, $director);
			break;
    }
}

if(mysqli_connect_errno()){
	echo "Failed";
}	



function insert($con,$movieid,$movietitle,$movieyear,$description, $duration,$rating, $quantity, $price, $imagefile, $genre, $trailer, $director)
{
	
	$sql = "INSERT INTO `MOVIE`(`MOVIEID`, `TITLE`,`YEAR`, `DESCRIPTION`, `DURATION`, `RATING`, `QUANTITY`, `PRICE`, `IMAGE`, `GENRE`, `TRAILER`, `Director`) VALUES ('$movieid','$movietitle','$movieyear','$description','$duration','$rating', '$quantity', '$price', '$imagefile', '$genre', '$trailer', '$director')";
	//echo $sql;
	$result = mysqli_query($con,$sql);
	echo $result;
	exit;
}	

mysqli_close($con);

?>