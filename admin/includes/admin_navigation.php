        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">BLog Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             <?php
              $img_query = "Select * from user where user_username= '{$_COOKIE['username']}'";
              $img_result = mysqli_query($con,$img_query);
                
              while($row = mysqli_fetch_assoc($img_result)){
                  $user_img = $row['user_img'];
              }
                
             ?>
              <li><a href="#"><img src="../images/<?php echo $user_img?>" style="height: 50px;width: 50px;border-radius: 25px;" alt=""></a></li>
               <li><a href="../index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
                

<!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    
                    
                    <i class="fa fa-user"></i> <?php //echo $_SESSION['firstname'];?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
 
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
-->
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                    <?php 
                    if($_COOKIE['user_role'] == 'admin'){
                    ?>
                    <a href="posts.php?source=view_all_post">View All Posts</a>
                    <?php
                    }else{
                    ?>
                    <a href="posts.php?source=view_all_post_user">View All Posts</a>
                    <?php  
                    }
                    ?>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Posts</a>
                            </li>
                        </ul>
                    </li>


                   
                   
             <?php 
                    
                     if(isset($_COOKIE['user_role'])){
                         
                         if($_COOKIE['user_role'] == 'admin'){
                             echo "<li>
                        <a href='categories.php'><i class='fa fa-fw fa-wrench'></i> Categories</a>
                    </li>";
                         }}
                     if(isset($_COOKIE['user_role'])){
                         
                         if($_COOKIE['user_role'] == 'admin'){
                            echo " <li>
                            <a href='comments.php?source=view_all_comments'><i class='fa fa-fw fa-file'></i> Coments</a>
                            </li>";
                         }}
                   ?>
                  <?php 
                    
                     if(isset($_COOKIE['user_role'])){
                         
                         if($_COOKIE['user_role'] == 'admin'){
                             echo "<li>
                        <a href='javascript:;' data-toggle='collapse' data-target='#demo'>
                        <i class='fa fa-fw fa-arrows-v'></i> Users <i class='fa fa-fw fa-caret-down'></i></a>
                        <ul id='demo' class='collapse'>
                            <li>
                                <a href='users.php?source=view_all_users'>View All Users</a>
                            </li>
                            <li>
                                <a href='users.php?source=add_user'>Add User</a>
                            </li>
                        </ul>
                    </li>";
                         }
                         
                         
                         
                         
                     }
                     
                     ?>
                    
                    
                    
                    
<!--
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                        <i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php?source=view_all_users">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>
-->
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i>Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>