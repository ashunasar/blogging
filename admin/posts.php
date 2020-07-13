<?php include "includes/admin_header.php" ?>

    <div id="wrapper">
    <script>
    document.getElementsByTagName('body')[0].style.display="block";
    </script>

        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              Welcome To Post
                    <?php
                    if(isset($_COOKIE['user_role'])){
                    if($_COOKIE['user_role'] == 'admin'){
                    ?>
                    <small>You Can Check All Posts Here</small>
                    <?php
                    }
                    else{
                    ?>
                    <small>Your All Post Is Here</small>
                    <?php
                    }
                    }?>
                            
                        </h1>

          <?php 

    
         if(isset($_GET['source'])){
             $source =$_GET['source'];
             
             switch($source){
                 case 'add_post':
                   include "includes/add_post.php";
                   break;
                 case 'edit_post':
                   include "includes/edit_post.php";
                   break;
                case 'view_all_post_user':
                   include "includes/view_all_post_user.php";
                   include "includes/delete.php";
                   break;
                case 'add_post_new':
                    include "includes/add_post_new.php";
                    break;
                default :
                     include "includes/view_all_posts.php";
                     include "includes/delete.php";
                       
             }
             
   
         }



            ?>
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<?php include "includes/admin_footer.php" ?>
