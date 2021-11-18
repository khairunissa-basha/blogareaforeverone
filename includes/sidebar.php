<?php
include("includes/header.php");
?>

<ul class="collection">
    <li class="collection-item">
        <form action="search.php" method="GET">
        <div class="input-field">
            <input type="text" id="search" name="search" placeholder="Search Anything">
            <div class="center">
                <input type="submit" class="btn red lighten-2" value="Search" name="submit">
            </div>
        </div>
</form>
    </li>
</ul>

<div class="collection">
    <h5 class="pink-text">Trending Blogs</h5>
    <?php
    $sql="select * from post order by view DESC";
    $res=mysqli_query($db_conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
    ?>
    <a href="" class="collection-item grey lighten-3"><?php echo $row['title'];?></a>
    <?php
    }?>
</div>
</div>
