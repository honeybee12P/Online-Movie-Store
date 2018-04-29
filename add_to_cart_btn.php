<?php
    session_start();
    $loginStatus = TRUE; 
    if($_SESSION['USER_NAME'] == ""){
        $loginStatus = FALSE; 
    } 

    // if (!isset($_SESSION['USER_NAME'])) {
    //         exit(header("Location:login.html"));
    // }
    // echo("Hi".$_SESSION['USER_NAME']);
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
   // $_SESSION["USER_NAME"]
    $p_query = 'SELECT price FROM movie where movieid ='.$_POST['movieId'];
    $price = mysqli_query($conn, $p_query);
    $row = mysqli_fetch_assoc($price);

    $u_query ="SELECT userid from users where user_name='".$_SESSION['USER_NAME']."'";
    $u_result = mysqli_query($conn, $u_query);
    $usr_data = mysqli_fetch_assoc($u_result);

    // echo($usr_data['userid']);
    // echo("Hiii");
  // $usr_data['USERID'];

    $query = "SELECT * FROM cart where movieid ='".$_POST['movieId']."'and userid =" .$usr_data['userid'];
    $result = mysqli_query($conn, $query);
    $rowcount = mysqli_num_rows($result);
    $qty_data = mysqli_fetch_assoc($result);

    // echo $qty_data['QUANTITY'];
    if($loginStatus){
        if ($rowcount>0){
            $old_qty =$qty_data['QUANTITY'];
            // echo $old_qty;
            $cart_qty = $_POST['quantity'];
            $new_qty = $cart_qty + $old_qty; 
            // echo "sadasd";
            // echo $new_qty;
            $query = "UPDATE cart SET Quantity = ".$new_qty." where  movieid = '".$_POST['movieId']."' and userid =" .$usr_data['userid'];
            if (mysqli_query($conn, $query)) {
                 
                echo "Updated the cart with the new quantity.";
            } 
            else {
                echo "Error-Update: ".$sql."<br>".mysqli_error($conn);
            }
            
        }
        else{ 
            $query ="INSERT into cart values (".$usr_data['userid'].",".$_POST['movieId'].",".$_POST['quantity'].",".$row['price'].")";
            if (mysqli_query($conn, $query)) {
                echo "Movie added to the cart.";
            } 
            else {
                echo "Error-Insert: ".$sql."<br>".mysqli_error($conn);
            }
        }
    }
    else {
        echo "Not logged In";
    }
    mysqli_close($conn);
?>