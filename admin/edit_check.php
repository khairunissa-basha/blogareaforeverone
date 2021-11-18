<?php
include("includes/header.php");

if(isset($_POST['edit'])){
  
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($db_conn, $id);
    $id=htmlentities($id);
    $title=$_POST['title'];
    $title=mysqli_real_escape_string($db_conn,$title);
    $title=htmlentities($title);
    $data=$_POST['ckeditor'];
    $data=mysqli_real_escape_string($db_conn,$data);
    $data=htmlentities($data);

    $sql="update post set title='$title' ,content='$data' where id='$id'";
  
    $res=mysqli_query($db_conn,$sql);
    if($res){
        $_SESSION['message']="<div class='chip green white-text'>post successfullly updated</div>";
        header("Location:edit.php?id=".$id);
    }else{
        $_SESSION['message']="<div class='chip red black-text'>Sorry something went wrong,try again</div>";
        header("Location:edit.php?id=".$id);
    }
}
?>