<?php
include("includes/header.php");

if (isset($_POST['submit1'])){

    $image=$_FILES['image'];
    $image_name=$_FILES['image']['name'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $image_type=$_FILES['image']['type'];

    if($image_type=="image/jpeg" || $image_type=="png"||$image_type=="jpg"){
            move_uploaded_file($tmp_dir, "../images/".$image_name);
           // $sql="insert into users (display_image) values ('$image_name')";
           $sql="update users set display_image=$image_name where id=$id";
            $res=mysqli_query($db_conn, $sql);
            if($res){
                header("Location:dashboard.php");
                $_SESSION['message']="<div class='chip green white-text'>DP updated successfully</div>";
               
            }else{
                header("Location:dashboard.php");
                $_SESSION['message']="<div class='chip red black-text'>DP not updated successfully</div>";
            }
    }//else{
        //echo "<div class='chip red black-text'>File formate not supported..</div>";
    //}

}
?>