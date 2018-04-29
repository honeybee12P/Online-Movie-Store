<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "onlinemoviestore";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = $_POST['userid'];

    //$order_id = 100;
    $order_id = rand(10,1000);
    
    //echo $id;

    $flag = 0;

    $c_query ="SELECT * from cart where userid=". $_POST['userid'];
    $c_result = mysqli_query($conn, $c_query);
    $count = mysqli_num_rows($c_result);

    if ($count== 0){
        echo "Please select items to buy !!";
    }
    else{
        while($crt_data = mysqli_fetch_array($c_result)) {
            $ins_prc =$crt_data["PRICE"];
            $ins_qty = $crt_data["QUANTITY"]; // qty selected by the user on the cart page
            $ins_mv_id = $crt_data["MOVIEID"];

            //echo $ins_mv_id;
        
            // Delete quantity
            $sel_qty ="SELECT quantity from movie where movieid=". $ins_mv_id;
            $qty_result = mysqli_query($conn, $sel_qty);
            $mv_qty = mysqli_fetch_assoc($qty_result); // original number of movies in the movie db.
            
            $final_qty = $mv_qty['quantity'] - $ins_qty; // updated value of movie in movie db.
            //echo $final_qty;
            if ($final_qty>=0){
                    $up_qty = "UPDATE movie set quantity='".$final_qty."' where movieid ='".$ins_mv_id."'";
                    $update_qty_result = mysqli_query($conn, $up_qty);
                // if ($final_qty ==0 ){
                //     $is_del_query = "UPDATE movie set is_deleted='1' where movieid ='".$ins_mv_id."'";
                //     $del_query_result = mysqli_query($conn, $is_del_query);
                // }
                $d= time();
                $date = (date("Y-m-d",$d));
            
                // Order history update
                $pur_hist ="INSERT into  purchase_history values ('".$ins_mv_id."','". $id."','". $order_id."','".$ins_prc."','".$ins_qty."','".$date."','0')";
                $purch_result = mysqli_query($conn, $pur_hist);
            
                // cart Update:
                $cart_del ="DELETE  from  cart  where userid ='".$id."'";
                $cart_del_result = mysqli_query($conn, $cart_del);

                $flag = 1;
            
            }
            else{
            $flag = 0;
            break;

            }
        }
        echo $flag;
    }
    
   

?>
