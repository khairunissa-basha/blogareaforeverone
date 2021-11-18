<?php
 include "includes/header.php";
 session_start();
 //include "includes/navbar.php";
 ?>

 <div class="row">
     <div class="col l9 m9 s12">
        <!--main post area-->
        <?php if(isset($_GET['id'])){
            $id=$_GET['id'];
            $id=mysqli_real_escape_string($db_conn, $id);
            $id=htmlentities($id);
            $sql="select * from post where id=$id";
            $res=mysqli_query($db_conn,$sql);
           {
               if(mysqli_num_rows($res)>0){
                   $sql1="select view from post where id=$id";
                   $res1=mysqli_query($db_conn,$sql1);
                   $row1=mysqli_fetch_assoc($res1);
                   $view=$row1['view'];
                   $view=$view+1;
                   $sql2="update post set view=$view where id=$id";
                   $res2=mysqli_query($db_conn,$sql2);

                   $row=mysqli_fetch_assoc($res);
                   ?>
               
                
               <div class="card-panel">
                   <h5 class="center"><?php echo ucfirst($row['title']);?></h5>
                    <p><?php echo ucwords($row['content']);?></p>
               </div>  

               <div class="row">
                   <div class="col l8 offset-l2 col m10 offset-m4 s12">
               <!--<div class="card-panel">-->
                       <h5 style="color:#F08080">weite Comments</h5>
                       <?php if(isset($_SESSION['message'])){
                           echo $_SESSION['message'];
                           unset($_SESSION['message']);
                       }
                       ?>
                       <form action="post.php?id=<?php echo $id; ?>" method="POST">
                            <div class="input-field">
                           <textarea name="comment" class="materialize-textarea" placeholder="comment goes here......"></textarea>
                           </div>
                           <div class="center">
                               <input type="submit" name="submit" value="comment" class="btn" style="background-color:#F08080">
                           </div>
               </form>
                   <h5>comments</h5>    
                   
               <ul class="collection">
                   
                       <?php
                       
                
                       $sql1="select * from comments where post_id=$id order by id DESC";
                       $res=mysqli_query($db_conn, $sql1);
                       if($res){
                         
                           if(mysqli_num_rows($res)>0){
                           while($row=mysqli_fetch_assoc($res)){
                           
                            
                                ?>
                            <li class="collection-item  grey lighten-3">
                                <?php echo $row['comment'];?>
                              
                            </li>
                            <?php
                            }
                        }
                    }
                    else{
                        
                       echo "error";
                        }
                    }
                }
                
                      
                       ?>
                   </ul>
                
            </div>  
               </div>
                        <h5 style="text-align:center; text-decoration:bold; color:#F08080">Related Blogs</h5>
          <div clas="row">              <!--<div class=" col l9 m9 s12">-->
        <?php
        $sql="select * from post order by rand() limit 5";
        $res=mysqli_query($db_conn, $sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
        ?>
        <div class="col l3 m4 s6">
            <div class="card small">
                <div class="card-image" >
                    <img src="images/<?php echo $row['feature_image'] ;?>" alt=""  >
                    <!---<span class="card-title black-text">blog1</span>-->
                </div>
                <div class="card-content center">
                 
                    <span class="card-title black-text truncate"><?php echo ucwords($row['title']);?></span>
                  
                    
                    
                </div>
                <div class="card-action red lighten-2">
                    <a href="post.php?id=<?php echo $row['id']; ?>" class="white-text">Read More</a>
                </div>
            </div>
        </div>
        <?php 
        }
        }
        ?>

    </div>
                    </div>
                
                <?php
                }
            
            
        
        ?>
        <div class="col l3 m3 s12">
 <?php
 include "includes/sidebar.php";

 ?>
 </div>
 </div>
<?php 
//Session_start();
?>
 <?php
   
    if(isset($_POST['submit']) && $_POST['comment']!=""){
        $comment=$_POST['comment'];
            $id=$_GET['id'];
           
            $id=htmlentities($id);
            $id=mysqli_real_escape_string($db_conn, $id);
           
            $comment=htmlentities($comment);
            $comment=mysqli_real_escape_string($db_conn, $comment);
           
            $sql="insert into comments (post_id,comment) values ('$id','$comment')";
            $res=mysqli_query($db_conn, $sql);
            if($res){
                    $_SESSION['message']="<div class='chip green white-text'>comment is saved successfully</div>";
                    header("Location:post.php?id=$id");
            }else{
                $_SESSION['message']="<div class='chip red black-text>Something went wrong</div>";
                header("Location:post.php?id=$id");
        }
    }/*else{
        $_SESSION['message']="<div class='chip red black-text'>Please write something</div>";
    }*/
?>