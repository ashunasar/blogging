    
        <script> 
        document.getElementsByTagName('body')[0].style.display="block";
        </script>  
               <?php 
                $user_details_query = "select * from user where user_username='{$_COOKIE['username']}'";
                $user_details  = mysqli_query($con,$user_details_query);
                 
                while($row = mysqli_fetch_assoc($user_details)){
                    
                     $user_username = $row['user_username'];
                     $user_name = $row['user_name'];
                     $user_img = $row['user_img'];
                    
                }
                ?>

              <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              Welcome to Admin Control 
                            <small><?php echo $user_name;?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                        
                        $query ="select * from post where post_author = '{$user_username}'";
                        $query_resut =mysqli_query($con,$query);
                        $posts =mysqli_num_rows($query_resut); 
                        ?>
                 <div class='huge'><?php echo $posts;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php?source=view_all_posts_user">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 

                    $query ="select * from categories";
                    $query_resut =mysqli_query($con,$query);

                    $categories =mysqli_num_rows($query_resut); 
                    ?> 
                        <div class='huge'><?php echo $categories;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details(restricted)</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                    
                     <!-- php for rest data-->
        <?php 

        $active_post_query ="select * from post where post_status ='published' and post_author='{$user_username}'";
        $active_post_query_result =mysqli_query($con,$active_post_query);
        $active_posts =mysqli_num_rows($active_post_query_result); 
                
        $pending_post_query ="select * from post where post_status ='draft'  and post_author='{$user_username}'";
        $pending_post_query_result =mysqli_query($con,$pending_post_query);
        $pending_posts =mysqli_num_rows($pending_post_query_result); 

        ?>
                <!-- /.row -->
               <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            

           <?php 
            
             $element_text = ['All Posts','Published Posts','Pending Posts'];
             $element_count = [$posts,$active_posts,$pending_posts];
        
             for($i=0; $i<3 ; $i++){
                 
           echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";          
                 
             }
             
            ?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
           
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
           
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

    </div>
    <!-- /#wrapper -->