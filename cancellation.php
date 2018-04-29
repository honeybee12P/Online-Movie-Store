<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "OnlineMovieStore";
 
     // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
     // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
     }
 
    $query = "UPDATE Purchase_History SET cancellation_status = 1 where orderid = '".$_POST['orderId']."'";
    if (mysqli_query($conn, $query)) {
        echo "Updated the record.";
    } 
    else {
        echo "Error-Update: ".$query."<br>".mysqli_error($conn);
    }
?>
