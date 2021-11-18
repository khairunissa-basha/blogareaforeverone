<?php
include("includes/header.php");

if(isset($_GET('id'))){
            $id=$_GET['id'];
            $id=htmlentities($id);
            $id=mysqli_real_escape_string($db_conn,$id);
            $sql="delete * from comments where id=$id";
            $res=mysqli_query($db_conn,$sql);
            if($res){
                echo "<div class='chip green white-text'>Removed successfully</div>";
            }else{
                echo "<div class='chip red black-text'>something went wrong</div>";
            }
}else{
    echo "<div class='chip red black-text'>Something went wrong</div>";
}

?>