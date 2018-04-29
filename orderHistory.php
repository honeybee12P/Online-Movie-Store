<?php
    session_start();

    if (!isset($_SESSION['USER_NAME'])) {
        exit(header("Location:onlineLogin.php"));
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FlickStar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/cancel.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css" />
<style>
	.grad1 {
	    height: 760px;
	    background: blue; /* For browsers that do not support gradients */
	    background: linear-gradient(to bottom right,#071021, #0f2242,#112344,#1b335e); /* Standard syntax (must be last) */
	}
	h3 {
		font-size: 40px;
		font-weight: bold;
		padding-left:10px;
		color:white;
	}
	h4 {
		font-size: 18px;
		font-weight: bold;
		padding-left:10px;
		color:white;
	}
	h5 {
		font-size: 16px;
		font-weight: bold;
		padding-left:10px;
		color:#35bcce;
	}
	td{
		color:#35bcce;
		padding: 5px;
	}
	table{
		border: 1px solid white;
	}
	button {
		background: linear-gradient(to bottom right, #acb0b7, white);
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

	.grad1 table {
		margin-bottom:20px;
	}
</style>
</head>

<body class = "grad1">
	<?php include 'nav.php' ?>
	<?php $servername = "localhost";
            $username = "root";
            $password = "root";
			$dbname = "onlinemoviestore";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }?>
<table style="width:80%;margin-left: 40px;margin-bottom: 80px;" border="1px;">
	<h4 style = "font-size: 18px;
		font-weight: bold;
		padding-left:10px;
		color:white;"> Your order history</h4> <br>
		<tr>
			<td>Order Id</td>
			<td>Movie</td>
			<td>Price</td>
			<td>Quantity</td>
			<td>Date</td>
			<td>Cancellation Status</td>
		</tr>
	<?php

		$u_query ="SELECT userid from users where user_name='".$_SESSION['USER_NAME']."'";
		$u_result = mysqli_query($conn, $u_query);
		$usr_data = mysqli_fetch_assoc($u_result);
		$user_id_det = $usr_data['userid'];
		echo $user_id_det;
		

	
		$query = mysqli_query($connection,"select * from purchase_history where userid =$user_id_det");
		while ($top =  mysqli_fetch_assoc($query)) 	{
			$mid = $top['movieid'];
			$oid = $top['orderid'];
			$query1 = mysqli_query($connection,"select * from movie where movieid = $mid");
			$top1 =  mysqli_fetch_assoc($query1);
		?> 
		<tr>
			<td><?php echo $top['orderid']?></td>
			<td><?php
							echo '<img src="'.$top1['IMAGE'].'" alt="header img" style="width:200px;height: 120px;">';
						?></td>
			<td><?php echo $top['price']?></td>
			<td><?php echo $top['quantity']?></td>
			<td><?php echo $top['date']?></td>
			<?php 
				if($top[cancellation_status] == 1) {
			?>
			<td align="center">Order Cancelled</td>
			<?php 
		} else  {
			?> 
			<td align="center">
				<!-- <form action="/cancel.php"> -->
				<!-- <button class="btn btn-default" type="submit" name="submit">
	            <i class="glyphicon glyphicon-remove"></i> Cancel Order
	          </button> -->
			<!-- </form> --><?php echo "<button type='button' class='btn btn-primary'data-type='del' data-field='".$oid."'>Cancel Order</button>"?>
			
		</td>
			<?php 
		}
			?>
		</tr>
		<?php }
		 
		?>	
		</table>
<div class="footer">© 2018 Copyright: FlickStar</div>
</body>
</html>