<?php 
include "config.php";
$page =  basename($_SERVER['PHP_SELF'])  ;

switch ($page) {
    case 'single.php':
        if (isset($_GET['id'])) {
            $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
            $mysqli_query = mysqli_query($conn,$sql_title) or die("Title query failed");
            $row_title = mysqli_fetch_assoc($mysqli_query);
            $page_title = $row_title['title']. " NEWS";
        }else{
            $page_title = "No post found";
        }
        break;
      case 'category.php':
        if (isset($_GET['cid'])) {
            $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
            $mysqli_query = mysqli_query($conn,$sql_title) or die("Title query failed");
            $row_title = mysqli_fetch_assoc($mysqli_query);
            $page_title = $row_title['category_name'] . " NEWS";
        }else{
            $page_title = "No post found";
        }
        break;
          case 'author.php':
        if (isset($_GET['aid'])) {
            $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
            $mysqli_query = mysqli_query($conn,$sql_title) or die("Title query failed");
            $row_title = mysqli_fetch_assoc($mysqli_query);
            $page_title =  "News By: " . $row_title['first_name']." ".$row_title['last_name'];
        }else{
            $page_title = "No post found";
        }
        break;
          case 'search.php':
        if (isset($_GET['search'])) {
            $page_title = $_GET['search'];
        }else{
            $page_title = "No search found";
        }
        break;
        default:
            $sql_title = "SELECT website_name FROM settings";
            $result_title = mysqli_query($conn,$sql_title) or die("Title query failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['website_name'];
            
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo  $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <?php
                   include "config.php";

                  $sql = "SELECT * FROM settings";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        if ($row['logo'] == "") {
                           echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                        }else{
                          echo '<a href="index.php" id="logo"><img src="admin/images/'. $row['logo'] .'"></a>';
                        }
                       }
                       } 
                 ?>
            
            </div>
            <!-- /LOGO -->

                    <div class="col-md-offset-9  col-md-4 ">
<?php

session_start();

?>
<a style='background-color: #00800; color: white;text-align: center;margin: 4px'  href='admin/users.php' class='login-button'><?php if(isset($_SESSION['username'])){echo " Profile";}?></a>

<a style='background-color: #008000; color: white;text-align: center;margin: 4px'  href='admin/index.php' class='login-button'><?php if(!isset($_SESSION['username'])){echo "SIGN IN";}?></a>

<a style='background-color: #4B0082; color: white;text-align: center;margin: 10px' href="admin/sign_up.php" class="login-button"><?php if(!isset($_SESSION['username'])){echo "SIGN UP";}?></a>

<a style='background-color: #008000; color: white;text-align: center;margin: 10px'  href='admin/logout.php' class='logut-button'><?php if(isset($_SESSION['username'])){echo "LOG OUT";}?></a>


                    </div>

        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    include"config.php";
                    if (isset($_GET['cid'])) {
                    $cat_id = $_GET['cid'];
                    }
                    $sql = "SELECT * FROM category WHERE post > 0";
                    $result = mysqli_query($conn, $sql) or die("Query Failed : CATEGORY");
                      if (mysqli_num_rows($result)) {
                        $active = "";
                     ?>
                <ul class='menu'>

                    <?php while($row = mysqli_fetch_assoc($result)){
                        if (isset($_GET['cid'])) {
                           if ($row['category_id'] == $cat_id) {
                            $active = "active";
                        }else{
                            $active = "";
                        }
                        }
                        
                    echo "<li><a class ='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                    } ?>
                     <li>
                                <a href="index.php">Home</a>
                    </li>
                </ul>
                   <?php  } ?>
                   
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
