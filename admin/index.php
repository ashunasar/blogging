<?php include "includes/admin_header.php" ?>




    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ;
    
       if($_COOKIE['user_role'] == 'admin'){
         include "admin_content.php";
       }
      else if($_COOKIE['user_role'] == 'student'){
           include "student_content.php";
       }
else{
  ?>
  
   <script>
   window.location = '../index.php';     
   </script>
  
  <?php
}?>
                   
<?php include "includes/admin_footer.php"; ?>
