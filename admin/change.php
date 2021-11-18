<?php 
include("includes/navbar.php");
if(isset($_SESSION['username'])){
 $username=$_SESSION['username'];
 ?>
      

<div class="main">
   <div class="card-panel">
   
       <h5 class="center">Change password</h5>
       <?//php echo $id;?>
       <?php
        if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
       ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!--<label for="password">Enter new password:</label>-->
            <input type="password" name="password" placeholder="enter password">
        
            <!--<label for="confirm-password">Re-Enter password:</label>-->
            <input type="password" name="con_password" placeholder="Re-enter password">

            <div class="center">
              <input type="submit" value="submit" name="submit" class="btn">
            </div>
        </form>
         <br>
         <br>
         </div>
    </div>

    <?php
    
    if(isset($_POST['submit'])) {
     
      $password=$_POST['password'];
      $con_password=$_POST['con_password'];
    
    
      $password=htmlentities($password);
      $password=mysqli_real_escape_string($db_conn, $password);
      $con_password=htmlentities($con_password);
      $con_password=mysqli_real_escape_string($db_conn,$con_password);

      if($password===$con_password){
        
          $password=password_hash($password, PASSWORD_BCRYPT);
          $sql1="update users set password='$password' where username='$username'";
          $res=mysqli_query($db_conn,$sql1);
          if($res){
            $_SESSION['message']="<div class='chip green white-text'>Password changed</div>";
            header("Location:change.php");
          }else{
            $_SESSION['message']="<div class='chip red white-text'>Something went wrong..</div>";
            header("Location:change.php");
          }
      }//else{
       // $_SESSION['message']="<div class='chip red white-text'>Password do not match</div>";
        //header("Location:change.php");
     // }
    
    }//else{
   //$_SESSION['message']="<div class='chip red white-text'>login</div>";
    //header("Location:change.php");
 // }
}
//else{
    //echo"<div class='chip red white-text'>Login to continue</div>";
    //header("Location:login.php");
//}
?> 