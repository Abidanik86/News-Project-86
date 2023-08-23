<div id ="footer">
    <div class="container">
<?php 
include"config.php";
$sql = "SELECT * FROM settings  ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
 ?>
         <div class="row">
            <div class="col-md-12">
                <span><?php echo $row['footer_desc'];?></span>
            </div>
        </div>
    </div>
</div>
<?php }  ?>
</body>
</html>
