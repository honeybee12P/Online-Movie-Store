<?php 

$con = mysqli_connect("localhost","root","root","onlinemoviestore");
//$movieid = mysqli_real_escape_string($con, $_POST['movieid']);



if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Update':
            $movietitleEDIT = mysqli_real_escape_string($con, $_POST['movietitleEDIT']);
            $movietitle= mysqli_real_escape_string($con, $_POST['movietitle']);
            $movieyear= mysqli_real_escape_string($con, $_POST['movieyear']);
            $description= mysqli_real_escape_string($con, $_POST['description']);
            $duration= mysqli_real_escape_string($con, $_POST['duration']);
            $rating = mysqli_real_escape_string($con, $_POST['rating']);
            $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
            $price = mysqli_real_escape_string($con, $_POST['price']);
            $genre = mysqli_real_escape_string($con, $_POST['genre']);
            $trailer = mysqli_real_escape_string($con, $_POST['trailer']);
            //$instock = mysqli_real_escape_string($con, $_POST['instock']);
            $imagefile = mysqli_real_escape_string($con, $_POST['imagefile']);
            $imagefile = str_replace('\\', '/', $imagefile);
            $imagefile = basename($imagefile);
            $director = mysqli_real_escape_string($con, $_POST['director']);
            update($con,$movietitleEDIT,$movietitle,$movieyear,$description, $duration,$rating, $quantity, $price,$imagefile, $genre, $trailer, $director);
            break;
    }
}

if(mysqli_connect_errno()){
	echo "Failed";
}	



function update($con,$movietitleEDIT,$movietitle,$movieyear,$description, $duration,$rating, $quantity, $price,$imagefile, $genre, $trailer, $director)
{
    $get_id = "SELECT `MOVIEID` FROM `MOVIE` where `TITLE`='$movietitle'";
    $row= mysqli_query($con,$get_id);
    $id = mysqli_fetch_assoc($row);
    $movieid = $id['MOVIEID'];

    $sql = "UPDATE `MOVIE` set `TITLE`='$movietitleEDIT',`YEAR` ='$movieyear',`DESCRIPTION`='$description',`DURATION`='$duration', `RATING`='$rating', `QUANTITY`='$quantity', `PRICE`='$price',`IMAGE`='$imagefile', `GENRE` ='$genre', `TRAILER`= '$trailer', `Director` = '$director' where `MOVIEID`='$movieid'";
	$result = mysqli_query($con,$sql);
	echo $result;
	exit;
}

mysqli_close($con);

?>