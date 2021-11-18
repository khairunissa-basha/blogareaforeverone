   <?php include ("includes/navbar.php");?>
  
   <?php if(isset($_SESSION['username'])){
       $username=$_SESSION['username'];?>
   
   <body>

<div class="main">
<div class="row">

<!-- recent posts-->
<div class="col l6 m6 s12">
<ul class="collection with-header">
<li class="collection-header red lighten-2">
<h5 class="white-text">Recent Posts</h5>
 <?/*php
   echo $username; ?>
   <?php echo $_SESSION['email']; ?>
   <?php echo  $_SESSION['u_id'];?>*/
</li>
<?php


$sql1="select * from post where username='$username' order by id DESC";
$res1=mysqli_query($db_conn, $sql1);
if(mysqli_num_rows($res1)>0){
   while($row=mysqli_fetch_assoc($res1)){
      ?>
      <li class="collection-item">
   <a href=""> <?php echo $row['title'];?></a>
 
      <br>
   <span> <a href="edit.php?id=<?php echo $row['id'];?>"><i class="material-icons tiny yellow-text">edit</i>Edit</a> | <a href=""><i class="material-icons tiny green-text">share</i>Share</a> | <a href="" class="delete" id=<?php echo $row['id']; ?>><i class="material-icons tiny red-text">delete</i>Delete</a></span>
</li>
<?php 
   }
}else{
    ?>
    <div class="card-panel center">
        <?php echo $_SESSION['message']="<div class='chip red lighten-2 white-text'>You dont have any post</div>";
        unset($_SESSION['message']);?>
    </div>
    <?php
  
}
?>
</ul>
</div>
<!--recent comments--->

<div class="col l6 m6 s12">
<ul class="collection with-header">
<li class="collection-header red lighten-2">
<h5 class="white-text">Recent Comments</h5>
</li>
<span id="message1"></span>
<?php
$sql1="select * from comments order by id DESC";

$res1=mysqli_query($db_conn,$sql1);

    
    if(mysqli_num_rows($res1)>0){
        while($row1=mysqli_fetch_assoc($res1)){
            ?>
            <li class="collection-item">
<?php echo $row1['comment']; ?>
<?php echo $row1['id'];?>
<br>
<span><a href="" class="approve" id="<?php echo $row1['id']; ?>"><i class="material-icons tiny green-text">done</i>Approve</a>| <a href="" class="deletecomment" id="<?php echo $row1['id']; ?>"><i class="material-icons tiny red-text">clear</i>Remove</a></span>
</li>
            <?php
        }
    }else{
       ?>
       <div class="card-panel center">
        <?php echo $_SESSION['message']="<div class='chip red lighten-2 white-text'>You have no comments</div>";
        unset($_SESSION['message']);?>
    </div>
    <?php
    }


?>
</ul>
</div>
</div>
</div>
<?php   echo $_SESSION['username']; ?>
<div class="fixed-action-btn">
    <a href="write.php" class="btn-floating btn btn-large  red lighten-2 pulse"><i class="material-icons">edit</i></a>
</div>


<!---approve comment-->
<script>
  
    const approve = document.querySelectorAll(".approve");
    approve.forEach(function(item,index)
    {
    item.addEventListener('click',approveNow)
    })
    function approveNow(e){
     
        e.preventDefault();
        if(confirm("do you really want to approve it")){
        
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "approve.php?id="+Number(e.target.id),true)
            xhr.onload=function(){
                const msg=xhr.responseText;
                const message=document.getElementById('message1');
                message.innerHTML=msg;
            }
            xhr.send()
        }
    }
    </script>

<!-- delete post--->
    <script>
        const del = document.querySelectorAll('.delete');

        del.forEach(function(item,index)         {
            item.addEventListener('click',deleteNow)
        })

        function deleteNow(e){
            e.preventDefault();
            if(confirm("Do you really want to delete..?"))
            {
                const xhr= new XMLHttpRequest();
                xhr.open("GET","delete.php?id="+Number(e.target.id),true)
                xhr.onload=function(){
                    const msg1 =xhr.responseText;
                    const message=document.getElementById('message');
                    message.innerHTML=msg1;

                
                }                  xhr.send();
            }
        }
        </script>
<!-- delete comment--->-
        <script>
            
            const delcomment=document.querySelectorAll('.deletecomment');
            delcomment.forEach(function(item,index)
            {
                confirm("Do you really want to remove it");
                item.addEventListener('click',deletecommentNow)
            })

            function deletecommentNow(e){
                e.preventDefault();
                if(confirm("Do you really want to remove it")){
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET","delete_comment.php?id=".+Number(e.target.id),ture)
                    xhr.onload=function(){
                        const msg = xhr.responsetext;
                        const message=document.getElementById('message1');
                        message.innerHTML=msg;
                    }
                    xhr.send();
                }
            }
            </script>

            <script>
                /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

                </script>
    


<?php include("includes/footer.php");
 } else {
    echo"<div class='chip red white-text'>Login Please</div>";
   
    header("Location:login.php");
 }
?>