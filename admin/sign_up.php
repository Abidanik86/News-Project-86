<?php include "sign_up_header.php";
      //include "user_role.php";
      include "config.php";
session_start();
if(isset($_SESSION['user_id'])) {
  header("Location:http://localhost/news-template/admin/logout.php");         
          }          
if (isset($_POST['save'])) {
  $fname =mysqli_real_escape_string($conn,$_POST['fname']);
  $lname =mysqli_real_escape_string($conn,$_POST['lname']);
  $user  =mysqli_real_escape_string($conn,$_POST['user']);
  $pass  =mysqli_real_escape_string($conn,md5($_POST['password']));
  $role  =mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "SELECT username FROM user WHERE username = '{$user}'";
  $result = mysqli_query($conn,$sql) or die("Query Failed");

  if (mysqli_num_rows($result)) {
    echo "<p style='color: red;text-align: center;margin: 10px'>Username Already Used<p>";
  }else{
    $sql1    = "INSERT INTO user(first_name,last_name,username,password,role)
                VALUES ('{$fname}','{$lname}','{$user}','{$pass}','{$role}')";
     if(mysqli_query($conn,$sql1)){
      header("Location:http://localhost/news-template/admin/users.php");
     }

  }
}
if (isset($_POST['cancel_button'])) {
  header("Location:{$hostname}/");
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">SIGN UP</h1> 
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" requ
                          ired>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" >
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="SIGN UP" required />
                      <input style="background-color: #FF0000; color: white;" type="submit" name="cancel_button" value="Cancel" class="red-button">
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
