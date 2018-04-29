<?php 

session_start();
$con = mysqli_connect("localhost","root","root","onlinemoviestore");

//if (isset($_POST['action'])) {
//    switch ($_POST['action']) {
//		 case 'Delete':
//		     $movietitle= mysqli_real_escape_string($con, $_POST['movietitle']);
//             echo '<script type="text/javascript">alert("' . $movietitle . '"); </script>';
//            deleteCourse($con,$movietitle);
//            break;
//    }
//}
$movietitle = $_POST["movietitle"];
deleteCourse($con,$movietitle);


if(mysqli_connect_errno()){
	echo "Failed";
}	



function deleteCourse($con,$movietitle)
{

	$get_id = "SELECT `MOVIEID` FROM `MOVIE` where `TITLE`='$movietitle'";
	$row= mysqli_query($con,$get_id);
    $id = mysqli_fetch_assoc($row);
    $movie = $id['MOVIEID'];

    $get_quantity = "SELECT `QUANTITY` FROM `MOVIE` where `MOVIEID`='$movie'";
    // $row= mysqli_query($con,$get_quantity);
    // $quantity = mysqli_fetch_assoc($row);
    // if ($quantity['QUANTITY'] > 0 ) {
	//     $decrease = "UPDATE `MOVIE` SET `QUANTITY` = (`QUANTITY`-1) WHERE `MOVIEID`='$movie'";
    //     mysqli_query($con,$decrease);
    //     $get_quantity2 = "SELECT `QUANTITY` FROM `MOVIE` where `MOVIEID`='$movie'";
    //     $row2= mysqli_query($con,$get_quantity2);
    //     $quantity2 = mysqli_fetch_assoc($row2);
    //     if ($quantity2['QUANTITY']== 0){
    //         $deleted2 = "UPDATE `MOVIE` SET `IS_DELETED` = 1 WHERE `MOVIEID`='$movie'";
    //         mysqli_query($con,$deleted2);
    //     }
    // }

    $deleted2 = "UPDATE `MOVIE` SET `IS_DELETED` = 1 WHERE `MOVIEID`='$movie'";
    mysqli_query($con,$deleted2);

	exit;
}	



mysqli_close($con);

?>