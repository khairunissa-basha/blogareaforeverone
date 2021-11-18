<?php
include("includes/header.php");

if(isset($_GET['id'])){ 
    
    $id=$_GET['id'];
    
    
    $id=mysqli_real_escape_string($db_conn, $id);
    $id=htmlentities($id);
    //$sql="update comments set status=1 where id=$id";
   
    $sql="update comments set status=1 where id=$id";
  
    $res=mysqli_query($db_conn, $sql);
    if($res){
        echo "ggg";
        echo "<div class='chip green white-text'>Approved Successfully</div>";
    }else{
        echo "<div class='chip red black-text'>Something went wrong</div>";
    }
}else{
    echo "<div class='chip red black-text'>id not found</div>";
}

?>
