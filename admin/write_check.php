<?php include "includes/header.php" ;
//$username=$_GET['username'];
$username=$_SESSION['username'];
    if(isset($_POST['publish'])){
    $data=$_POST['ckeditor'];
    $data=mysqli_real_escape_string($db_conn,$data);
    //$data=htmlentities($data);
    $title=$_POST['title'];
    $title=mysqli_real_escape_string($db_conn, $title);
    $title=htmlentities($title);
    $image=$_FILES['image'];
    $img_name=$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $img_type=$_FILES['image']['type'];

    if($img_type=="image/jpeg" ||$img_type=="image/png"||$img_type=="img/jpg"){
        if($img_size <= 2097152){
                move_uploaded_file($tmp_dir, "../images/".$img_name);
            $sql="insert into post(title,content,feature_image,username) values('$title','$data','$img_name','$username')";
    $res=mysqli_query($db_conn, $sql);
    if($res){
        header("Location:write.php");
        $_SESSION['message']="<div class='chip green white-text'>post successfully saved</div>";
    }else{
        header("Location:write.php");
        $_SESSION['message']="<div class='chip red black-text'>Sorry something went wrong!!</div>";
    }

        }else{
            header("Location:write.php");
            $_SESSION['message']="<div class='chip red black-text'>Sorry file size exceeded 2mb...</div>";
        }
    }else{
        header("Location:write.php");
        $_SESSION['message']="<div class='chip red black-text'>sorry file formate not supported...</div>";
    }
}




?>