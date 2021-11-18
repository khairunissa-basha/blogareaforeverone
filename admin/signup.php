<?php
include("includes/header.php");
print_r($db_conn);

if(isset($_POST['signup'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $username=mysqli_real_escape_string($db_conn, $username);
    $email=mysqli_real_escape_string($db_conn, $email);
    $password=mysqli_real_escape_string($db_conn,$password);
    $username=htmlentities($username);
    $email=htmlentities($email);
    $password=htmlentities($password);
    $password=password_hash($password, PASSWORD_BCRYPT);

    //echo $username,$email,$password;

   /*$sql1="select * from users where email='$email' or username='$username'";
    $res1=mysqli_query($db_conn,$sql1);
    if(mysqli_num_rows($res1)>0){
        header("Location:login.php");
        echo $_SESSION['message']="Account already exist login to continue...";
    }else{
        $sql="insert into users(email,username,password) values('$email','$username','$password')";
        $res=mysqli_query($db_conn,$sql);
        if($res){
            header("Location:login.php");
            $_SESSION['message']="You are sucssesfully registered, login to continue...";
    }
    else{
        header("Location:signup.php");
        $_SESSION['message']="Something went wrong.. please register with correct values";
    }
    
    }*/

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($db_conn, $sql1);
    if(mysqli_num_rows($res1)>0){
        header("Location:login.php");
        $_SESSION['message']="<div class='chip red black-text'>Eamil already exist.... please register with different email</div>";
    }else{
        $sql2="select * from users where username='$username'";
        $res2=mysqli_query($db_conn, $sql2);
   
        if(mysqli_num_rows($res2)>0){
            header("Location:login.php");
            $_SESSION['message']="<div class='chip red black-text'>username already exist please register with different name</div>";
        }
    
    else{
            $sql="insert into users(email,username,password) values('$email','$username','$password')";
            $res=mysqli_query($db_conn,$sql);
            if($res){
                header("Location:login.php");
                $_SESSION['message']="<div class='chip green white-text'>You are sucssesfully registered, login to continue...</div>";
        }
        else{
            header("Location:signup.php");
            $_SESSION['message']="Something went wrong.. please register with correct values";
        }
        }
    }
    
}
?>