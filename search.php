<?php
include("includes/header.php");

if(isset($_GET['submit'])){
    $q = $_GET['search'];
    $q = mysqli_real_escape_string($db_conn,$q);
    $q = htmlentities($q);
    $sql="select * from post where title like '$q' or content like '$q' or title like '%$q%' or content like '%$q%' ";
    $res=mysqli_query($db_conn, $sql);
    if(mysqli_num_rows($res)>0){
    ?>
    <div class="row">
        <div class="col l9 m9 s4">
        <?php
        while($row=mysqli_fetch_assoc($res)){
                ?>
                <div class="col l3 m4 s6">
            <div class="card small">
                <div class="card-image" >
                    <img src="images/<?php echo $row['feature_image'] ;?>" alt=""  >
                    <!---<span class="card-title black-text">blog1</span>-->
                </div>
                <div class="card-content center">
                 
                    <span class="card-title black-text truncate"><?php echo $row['title'];?></span>
                  
                    
                    <?php echo $row['content'];?>
                </div>
                <div class="card-action red lighten-2">
                    <a href="post.php?id=<?php echo $row['id']; ?>" class="white-text">Read More</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
         </div>
        <!--sidebar area-->
    <div class="col l3 m3 s12">
        <!--<div class="collection">
            <div class="collection-item">-->
        <?php include "includes/sidebar.php" ?>
   
    </div>
        </div>
                <?php
        
    }
}
?>