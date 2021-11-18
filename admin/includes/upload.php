<?php
incude("includes/header.php");

if(isset($_post['submit'])){
    $display_image=$_POST['fileToUpload'];
    $sql="update users set display_image=$display_image where id=$id";
    $res=mysqli_query($db_conn,$sql);
    if($res){
        $_SESSION[message]="<div class='chip green white-text'>image successfully upladed</div>";
    }
}
?>