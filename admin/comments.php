<?php
    include("includes/navbar.php");
    $username=$_SESSION['username'];
    if(isset($_POST['submit'])){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $id=htmlentities($id);
            $id=mysqli_real_escape_string($db_conn, $id);
            $comment=htmlentities($comment);
            $comment=mysqli_real_escape_string($db_conn, $id);
            $sql="inset into comments (post_id,comment,username) values('$id','$comment','$username')";
            $res=mysqli_query($db_conn, $sql);
            if($res){
                    $_SESSION['message']="<div class='chip green white-text'>comment is saved successfully</div>";
            }else{
                $_SESSION['message']="<div class='chip red black-text>Something went wrong</div>";
            }
        }else{
            $_SESSION['message']="<div class='chip red black-text'>Sorry somehting went wrong</div>";
        }
    }else{
        $_SESSION['message']="<div class='chip red black-text'>Smething went wrong</div>";
    }
  
    
?>
