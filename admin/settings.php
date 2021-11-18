<?php 
include("includes/navbar.php");
if(isset($_SESSION['username'])){
 $username=$_SESSION['username'];

 ?>
      

<div class="main">
   <div class="card-panel">
   
       <h5 class="center">Change password</h5>
       
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

            <!--for image-->
            <br>
            <br><rb>
            <div class="center">
                        <h6 s tyle="text-color:red">Select an image</h6> <br>
                        <input type="file" id="image" name="image"><br>
                        <input type="submit" name="insert" id="insert" value="insert" class="btn">


                    </div>
        </form>
         <br>
         <br>
     
         <!--<form action="image_check.php" method="post" enctype="multipart/form-data">
       
       <h5 class="center">change image</h5>
     <input type="file" name="image">
     <div class="center">
     <a href="image_check.php"> <input type="submit" name="submit1" value="change dp"></a>
         </div>
     

   </form>-->-
   
        
     
        
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
            header("Location:settings.php");
          }else{
            $_SESSION['message']="<div class='chip red white-text'>Something went wrong..</div>";
            header("Location:settings.php");
          }
      }else{
        $_SESSION['message']="<div class='chip red white-text'>Password do not match</div>";
        header("Location:settings.php");
      }
    
    }//else{
    //$_SESSION['message']="<div class='chip red white-text'>login</div>";
    //header("Location:settings.php");
  //}
}
  ?>

  <script>
    $(document).ready(function(){
      $('#insert').click(function(){
          var image_name=$('#image').val();
          if(image_name==" "){
            alert("please select an imnage");
            return false;
          }else{
            var extension= $('#image').val().split('.').pop().tolowercase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
                alert("invalid image file");
                $('#image').val('');
                return false;
            }
          }
      })
    });
    </script>