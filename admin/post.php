
<?php include("includes/navbar.php");?>
<?php if(isset($_SESSION['username'])){?>
<div class="row main">
    <div class="col12 m12 s12">
        <div class="card-panel">
            <ul class="collection with-header">
                <li class="collection-header red lighten-2">
                    <span id="message"></span>
                    <h5 class="white-text">Recent Posts</h5>
                </li>
                <?php
                $sql="select * from post order by id desc ";
                $res=mysqli_query($db_conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <li class="collection-item">
                            <a href=""><?php echo $row['title'];?></a>
                       
                        <br>
                       <span><a href="edit.php?id=<?php echo $row['id'];?>"><i class="material-icons yellow-text tiny">edit</i>Edit</a>|
                        <a href=""><i class="material-icons tiny green-text">share</i>share</a>| 
                        <a href="" id="<?php echo $row['id'];?>" class="delete"><i class="material-icons tiny red-text">delete</i>delete</a></span>
                       </li>
                        <?php
                    }
                }else{?>
                   <div class="card-panel center">
                  <?php echo $_SESSION['message']="<div class='chip center red lighten-2 white-text '>You don't have any post...</div>";
                  unset($_SESSION['message']);?>
                   </div> 
                 <?php   
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="fixed-action-btn">
    <a href="write.php" class="btn-floating btn btn-large red lighten-2 pulse"><i class="material-icons">edit</i></a>
</div>

<script>
    const del=document.querySelectorAll(".delete");
    del.forEach(function(item,index){
        item.addEventListener("click",deleteNow)
    })

    function deleteNow(e){
      e.preventDefault();
        if(confirm("Do you really want to delete")){
            const xhr=new XMLHttpRequest();
            xhr.open("GET","delete.php?id="+Number(e.target.id),true)
            xhr.onload=function(){
                const msg=xhr.responseText;
                const message=document.getElementById('message')
                message.innerHTML=msg;
               
            }
            xhr.send()
        }
    }
    </script>
<?php }else{
    header("Location:login.php");
}?>