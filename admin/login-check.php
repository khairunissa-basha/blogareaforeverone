<?php
include("includes/header.php");
//print_r($db_conn);

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=mysqli_real_escape_string($db_conn, $username);
    $password=mysqli_real_escape_string($db_conn,$password);
    $username=htmlentities($username);
    $password=htmlentities($password);
   // $password=password_hash($password, PASSWORD_BCRYPT);
  
    $sql="select password,email,u_id from users where username='$username'";
    $res=mysqli_query($db_conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $_SESSION['u_id']=$row['u_id'];
    $pass=$row['password'];
    if(password_verify($password,$pass)){

      
       
        $_SESSION['username']=$username;
      
        $_SESSION['email']=$row['email'];
      

      
        header("Location:dashboard.php");

        //$_SESSION['message']="<div class='chip green white-text'>Welcome '$username'</div>";
   
    }else{
        header("Location:login.php");;
        $_SESSION['message']="<div class='chip red black-text'>credientials do not match..please try again...</div>";
    }
}