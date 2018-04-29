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
		<!-- <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css"/> -->
		<title>FlickStar</title>
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src ="js/my_cart_action.js"></script>
        <script src ="js/buy_btn_det.js"></script>

      
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <!-- <a class="navbar-brand" href="#">FlickStar</a> -->
                </div>

                <ul class="nav navbar-nav">
                    <li style="font-weight: bold;font-size: 20px;"><a href="#">FlickStar</a></li>
                    <li class="active"><a href="home.php">Home</a></li>
                </ul>

                <form class="navbar-form navbar-left" action="search.php">
                    
                    <select id="genre" name="genre" class="form-control" style="margin-left: 10px;width: 170px">
                        <option default>Select Genre</option>
                        <option value="action">Action</option>
                        <option value="animation">Animation</option>
                        <option value="romance">Romance</option>
                        <option value="horror">Horror</option>
                        <option value="thriller">Thriller</option>
                        <option value="sci-fi">Sci-Fi</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Drama">Drama</option>
                    </select>

                    <div class="input-group" style="margin-left: 20px;">
                        <input type="text" class="form-control" placeholder="Search Movie" name="search"  >
                        <div class="input-group-btn" >
                            <button class="btn btn-default" style = "margin-left:10px "type="submit" name="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                    
                </form>
                <div class ="navbar-header pull-right"  style = "margin-top: 15px" > 
                    <button id ="order" class ="button" style ="margin-right: 10px">Order Details</button>
                    <a href ='cartPage.php'><span class="glyphicon glyphicon-shopping-cart" style = "font-size: 20px"></span></a>
                    <a href ='onlineLogin.php'> <span class="glyphicon glyphicon-log-out navbar-link" style="font-size: 20px ; margin-left: 20px"></span></a>
		        </div>
            </div>
        </nav>
        <?php 
        //
            // User Session is activated

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "onlinemoviestore";

            

            $cart_data1 = "<tr><th><b>Movie Details</b></th><th><b>Price</b></th><th><b>Quantity</b></th><th><b>Total Amount</b></th><th></th></tr>";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $u_query ="SELECT userid from users where user_name='".$_SESSION['USER_NAME']."'";
            $u_result = mysqli_query($conn, $u_query);
            $usr_data = mysqli_fetch_assoc($u_result);

           // $query = "SELECT * FROM cart where movieid ='".$_POST['movieId']."'and userid =" .$usr_data['userid'];
            $query = "SELECT * FROM cart where USERID = " .$usr_data['userid'];
            $result1 = mysqli_query($conn, $query);
            
            $final_amt= 0;
            while($row = mysqli_fetch_array($result1)) {
                $mvid = $row["MOVIEID"];
                $prc = $row["PRICE"];
                $quant = $row["QUANTITY"];
                $tot_amt = $quant*$prc;
                //$query = "SELECT * FROM movie where id =". $_POST["id"];
                //$query = "SELECT * FROM "
                //$movie = mysqli_query($conn, $m_query);
                $query = "SELECT * FROM movie where movieid =".$mvid;
                $result = mysqli_query($conn, $query);
                $mov_row = mysqli_fetch_assoc($result);
               
                $mvie_name = $mov_row["TITLE"];
                $max_qant =$mov_row["QUANTITY"];
                $mvie_img = $mov_row["IMAGE"];
//$cart_row = "<tr><td><img src='".$mov_row["IMAGE"]."' alt='icon'  style ='width:50%'/></td><td>".$prc."</td><td><input id =text".$mvid." type='text' name='qty' style='width: 50px' value =".$quant."></td><td>".$tot_amt."</td><td><button type='button' class='btn btn-danger'>Delete</button></td></tr>";

                $disabled = 'false';
                if($quant == 1){
                    $disabled = 'true'; 
                }

                $cart_row = "<tr><td><img src='images/".$mov_row["IMAGE"]."' alt='icon'  style ='width:50%'/></td>
                <td><p id='price".$mvid."'>".$prc."</p></td><td>
                <div class='input-group'>
                <span class='input-group-btn'>
                    <button type='button' class='btn btn-default btn-number'data-type='minus' data-field='".$mvid."'>
                        <span class='glyphicon glyphicon-minus'></span>
                    </button>
                </span>
                <input type='text' name='".$mvid."' class='form-control input-number' style ='height: 27.5px' value=".$quant." min='1' max='".$max_qant."'>
                <span class='input-group-btn'>
                    <button type='button' class='btn btn-default btn-number' data-type='plus' data-field='".$mvid."'>
                        <span class='glyphicon glyphicon-plus'></span>
                    </button>
                </span>
                </div>
                </td><td><p id='tot".$mvid."' class ='tot_val'>".$quant*$prc."</p></td><td><button type='button' class='btn btn-danger'data-type='del' data-field='".$mvid."'>Delete</button></td></tr></div>";


                //echo $cart_row;
                $cart_data = $cart_data."".$cart_row;
                
                $tot_qty = $quant+ $tot_qty;
                $final_amt = $quant*$prc + $final_amt;
            }
                $tot_row = "<tr><td><b>Sub Total</b></td><td></td><td><p id='final_qty'>".$tot_qty."</p></td><td><p id='amt'>".$final_amt."</p></td><td><button id ='buy_btn' value = ".$usr_data['userid']." type='button' class='btn btn-success btn-lg' >Buy</button></td></tr>";
                $cart_data = $cart_data."".$tot_row;   
        ?>
        
        <div class="container">
            <!-- <div class ="cart_icon">
                <h2> <b>Welcome</b> <span class="glyphicon glyphicon-shopping-cart"> <span class="w3-badge">5</span></span></h2>
                <h3><b>My Cart </b> </h3>
            </div> -->
            <div>
                <h3><b>Welcome <?php echo $_SESSION['sess_USER_NAME'];?>!</b></h3> 
                <h3><b> Cart Details: </b> </h3>
            </div>
            <table class="cart_table">
                <thead><?php echo $cart_data1?></thead>
                <tbody><?php echo $cart_data ?></tbody>
            </table>
        </div>
    </body>
 </html>
      