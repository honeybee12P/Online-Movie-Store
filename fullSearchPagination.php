<?php  
 
 $connection=mysqli_connect("localhost","root","root");
 mysqli_select_db($connection,"OnlineMovieStore");
 $per_page = 3;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  

 $start_from = ($page - 1)*$per_page; 
 $search = $_POST['query']; 
 $genre = $_POST['criteria'];
 if(strlen($search)<=1)
 {
    $constructs = "SELECT * FROM movie where IS_DELETED = 0 AND genre like '$genre'";  
 }
 else if($genre == 'Select Genre')
 {
    $search_exploded = explode (" ", $search);
    
        $x = "";
        $construct = "";  
            
        foreach($search_exploded as $search_each)
        {
        $x++;
        if($x==1) { 
            $construct .="title LIKE '%$search_each%' OR Director LIKE '%$search_each%' OR Description like '%$search_each%' OR genre like '%$search_each%' OR year like '%$search_each%'";
        }
        else{
            $construct .="AND (title LIKE '%$search_each%' OR Director LIKE '%$search_each%' OR Description like '%$search_each%' OR genre like '%$search_each%' OR year like '%$search_each%')";
        }
            
        }
    $constructs ="SELECT * FROM movie where IS_DELETED = 0 AND $construct";
    } else {
    $search_exploded = explode (" ", $search);
    
        $x = "";
        $construct = "";  
            
        foreach($search_exploded as $search_each)
        {
        $x++;
        if($x==1) { 
            $construct .="title LIKE '%$search_each%' OR Director LIKE '%$search_each%' OR Description like '%$search_each%' OR genre like '%$search_each%' OR year like '%$search_each%'";
        }
        else{
            $construct .="AND (title LIKE '%$search_each%' OR Director LIKE '%$search_each%' OR Description like '%$search_each%' OR genre like '%$search_each%' OR year like '%$search_each%')";
        }
            
        }
    $constructs ="SELECT * FROM movie where IS_DELETED = 0 AND $construct AND genre like '$genre'";
    }
    $query = $constructs;
    $query .= "LIMIT $start_from,$per_page";
    $query2 = $constructs;  
    $result = mysqli_query($connection, $query);
    $result1= mysqli_query($connection, $query2);
    $total_records = mysqli_num_rows($result1);
    if($total_records == 0)
        echo "<h4>No results found !!</h4>";
    else{  
        echo "<h4> Search Results </h4>";
    $total_pages = ceil($total_records/$per_page);  
    $output.="<div class='col-sm-9' style='margin-left: 363px;'>
                <div class='row'> 
                    <div class='col-sm-3 pull-left'>
                    </div>
            <div class='col-sm-9 pull-right text-right'>
            <div class='list-pager'>
                <nav class='pagination'>
                <ul class='pagination'>";
    for($i=1; $i<=$total_pages; $i++)  
    {  
        if($i==$page)
        {
            $output.="<li class='active'><a class='pagination_link' id='".$i."'><span>".$i."</span></a></li>";
        }
        else
            $output.="<li><a class='pagination_link' id='".$i."'><span>".$i."</span></li>";
    }  
    $output .= '</ul></nav></div></div></div></div>';  
    
    while($row = mysqli_fetch_array($result))  
    {  
        $output .= '  
    <div class="col-sm-4 cake-type list-cake" style = "margin-top: 12px;">
        <div class="image-section" style="height: 180px;">
        <div id="image_div"><p class="img_wrapper">
            <img src="'.$row['IMAGE'].'" alt="header img" style="width:100%">
            <button onclick="window.location.href=\'info.php?id='.$row['MOVIEID'].'\'" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-info-sign" style="font-size: 40px; color: white;margin-top: 20px;margin-left: 150px;"></span>
        </button>
    </p></div>
    <div class="hover-div"> 
    </div>
    </div>

    </div>
    ';  
    
    }  
    echo $output; 
}  

 ?>  

