<?php
session_start();
function text_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$email= text_input($_POST["emailid"]);
$password= text_input($_POST['password']);
//$_SESSION["sess_username"]=$username;
//$_SESSION["sess_password"]=$password;
$db = 'onlinemoviestore';

$mysqli=new mysqli("localhost","root","root",$db);
if ($mysqli->connect_error){
        die('Could not connect to database!');
}
$query = 'SELECT * FROM `USERS` WHERE `EMAILID`="'.$email.'"' ;
$result=mysqli_query($mysqli,$query);

if(!$result)
{
	header('Location:login.html');
	exit();
}

else{

	 $userDetails = mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $name= $userDetails['USER_NAME'];
     $_SESSION["sess_USER_NAME"]=$name;
     $hash = $userDetails['PASSWORD'];
     $hash = substr( $hash, 0, 60 );
	 if(password_verify($password, $hash))
	 {
         header('Location:home.php');
	 }
	 else
	 {
         echo "<script> alert('Error in Login'); 
         window.location.href = 'login.html';
         </script>";
         //header('Location:login.html');
         exit();
	 }
}

?>

