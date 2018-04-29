<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemoviestore";
 
     // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
     // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $u_query ="SELECT userid from users where user_name='".$_SESSION['USER_NAME']."'";
    $u_result = mysqli_query($conn, $u_query);
    $usr_data = mysqli_fetch_assoc($u_result);
 
    $query = "UPDATE cart SET Quantity = ".$_POST['quantity']." where  movieid = '".$_POST['movieId']."' and userid =" .$usr_data['userid'];
    if (mysqli_query($conn, $query)) {
        echo "Updated the record.";
    } 
    else {
        echo "Error-Update: ".$query."<br>".mysqli_error($conn);
    }
?>
