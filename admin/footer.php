<div id ="footer">
    <div class="container">
<?php 
include"config.php";
$sql = "SELECT * FROM settings";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);

 ?>
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2023 News | Powered  by <a href="https://www.youtube.com/@BeeCode-zc2of/">Bee Code</a></span>
            </div>
        </div>
    </div> 
</div>
<?php }  ?>
</body>
</html>
