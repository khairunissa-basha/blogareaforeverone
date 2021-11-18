<?php
include "includes/header.php";
?>

<?php
include "includes/navbar.php";
?>

<div class="row">
    <!--main content area-->
    <div class=" col l9 m9 s12">
    <?php
        $sql="select * from post order by id DESC";
        $res=mysqli_query($db_conn, $sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
        ?>
        <div class="col l3 m4 s6">
            <div class="card small">
                <div class="card-image">
                    <div  style="text-align:center">
                    <img src="images/<?php echo $row['feature_image'] ;?>" alt="" style="width:350px; height:150px;">
                    </div>
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

<!--/div>-->

<?php
include "includes/footer.php";
?>