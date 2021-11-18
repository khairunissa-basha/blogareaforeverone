<?php include("includes/header.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($db_conn, $id);
    $id=htmlentities($id);

    $sql="delete from post where id=$id";
    $res=mysqli_query($db_conn,$sql);
    if($res){
        
        echo "<div class='chip green white-text'>Deleted Successfully</div>";
    }else{
            
        echo "<div class='chip red black-text'>Something Went Wrong</div>";
    }
}
?>