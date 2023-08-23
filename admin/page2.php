<?php
     
   $sql1 = "SELECT * FROM user";
   $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
   	if (mysqli_num_rows($result1)) {
   	  $total_records = mysqli_num_rows($result1);
   	  $total_page= ceil($total_records / $limit);
   	  echo '<ul class="pagination admin-pagination">';
   	  if ($page > 1) {
   	     echo'<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
   	  }
   		for($i=1; $i <= $total_page ; $i++) { 
   			if ($i == $page) {
   				$active = "active";
   			}else{
   				$active = "";
   			}
   			echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
   		}
   		 if ($total_page > $page) {
   	      echo'<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
   	  }
    echo "</ul>";
    }
?>