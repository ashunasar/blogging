<?php  include "includes/header.php"?> 

	<div id="colorlib-page">
		
		<?php  include "includes/navigation.php"?> 

		
		<!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
	    				<?php 
                             
                            if(isset($_GET['p_id'])){
                                
                                $the_post_id = $_GET['p_id'];
$view_query  = "UPDATE post SET post_views = post_views + 1 where post_id = {$the_post_id}";
                                mysqli_query($con,$view_query);
                                
                            }else{
                                ?>
                                <script>
                            window.location = 'index.php';
                             </script>
                                <?php
                            }
                            
                        ?>
	    				
       <?php 
          $query  = "SELECT * FROM post where post_id = '{$the_post_id}'";
                         $result =mysqli_query($con,$query);
                        if(!$result){
                            echo  "<h1>Error</h1>" . mysqli_error($con) ;
                        }
    
                            while($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_content =$row['post_content'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_image = $row['post_image'];
                                $post_date = $row['post_date'];
                                $post_views = $row['post_views'];
                                ?>
                                
                                       <?php 
          $img_query  = "SELECT * FROM user where  user_username= '{$post_author}'";
                         $img_result =mysqli_query($con,$img_query);
                        if(!$img_result){
                            echo  "<h1>Error</h1>" . mysqli_error($con) ;
                        }
    
                            while($row = mysqli_fetch_assoc($img_result)){
                            
                                 $user_image = $row['user_img'];
                            }
                                
                                ?>
                                
                                
                                
                                <h1 class="mb-3"><?php echo $post_title;?></h1>
                               
                            
                               <img src="images/<?php echo $post_image;?>" style="width:100%;" alt="" class="img-fluid">  <br><br><br>  <br><br><br>          
                            <div style="margin-top: 50px;"><?php echo $post_content;?></div>
                                
                <div class="about-author d-flex p-4 bg-light" style="width:100%">
		              <div class="bio mr-5">
		                <img src="images/<?php echo $user_image;?>" style="height:100px;" alt="Image placeholder" class="img-fluid mb-4">
		              </div>
		              <div class="desc">
		                <h3>Autor Name : <?php echo $post_author;?></h3>
		                <p>Posted On : <?php echo $post_date;?></p>
		                <p>Post Views : <?php echo $post_views;?> Views</p>
		                <p>Total Comments : <?php echo $post_comment_count;?> Comment</p>
		                
		              </div>
		            </div>  
                                

                                <?php
                                
                                
                            }
                            
                            
                            ?>
		            


                   <?php
                    if(isset($_COOKIE['user_role'])){
                        ?>
                    <div class="pt-5 mt-5" style="width:100%;">
		              <h3 class="mb-5 font-weight-bold">Comments</h3>
		              <ul class="comment-list">
                    <?php 
                          
                        $comment_display_query = "select * from comments where comment_post_id = {$the_post_id} and comment_status='approved'" ;
                        $comment_display = mysqli_query($con,$comment_display_query);

                        $count  = mysqli_num_rows($comment_display);
                        if($count != 0){
                        while($row = mysqli_fetch_assoc($comment_display)){
                            $comment_author = $row['comment_author'];
                            $comment_date = $row['comment_date'];
                            $comment_content = $row['comment_content'];

                        
                        $display_user_details ="select * from user where user_username ='{$comment_author}'";
                        $display_user = mysqli_query($con,$display_user_details);
                        while($row = mysqli_fetch_assoc($display_user)){
                        $user_name = $row['user_name'];
                        $user_img  = $row['user_img'];   
                        } 
                          ?>
                    
                    
                    
		                <li class="comment">
		                  <div class="vcard bio">
		                    <img src="images/<?php echo $user_img;?>" alt="Image placeholder">
		                  </div>
		                  <div class="comment-body">
		                    <h3><?php echo $user_name;?></h3>
		                    <div class="meta"><?php echo $comment_date;?></div>
		                    <p><?php echo $comment_content;?></p>
		                    
		                  </div>
		                </li>
		             
		              <!-- END comment-list -->
		              <?php }
                        
                        }else{
                            
                            echo "<h1>No comments Found On This Post</h1>";
                            
                        }
                        
                        ?>
                          </ul>

                         <?php  
                    
                        
                        if(isset($_POST['comment'])){
                    $comment_post_id = $_GET['p_id'];
                    $comment_content =  mysqli_real_escape_string($con,$_POST['comment_message']);
                    $comment_username =  $_COOKIE['username'];     
                    $comment_date    = 'now()';
                    $comment_status  = 'approved';
                            
                    $comment_query = "Insert into comments(comment_post_id,comment_author,comment_content,comment_status,	comment_date)";
                            
                    $comment_query .= "values({$comment_post_id},'{$comment_username}','{$comment_content}','{$comment_status}',{$comment_date})";
                            
                    $result =  mysqli_query($con,$comment_query);      
                        
                            if(!$result){
                                echo "<h1>error" . mysqli_error($con);
                            }
                            
                 $comment_cout_query = "UPDATE post SET post_comment_count = post_comment_count + 1 where post_id = $the_post_id";
                    mysqli_query($con,$comment_cout_query);
$view_query_new  = "UPDATE post SET post_views = post_views - 2 where post_id = {$the_post_id}";
                                mysqli_query($con,$view_query_new );
                            
                            header('Location:post.php?p_id='.$the_post_id);
                    
                        }
                        ?>

		              <div class="comment-form-wrap pt-5">
		                <h3 class="mb-5">Please Leave a comment</h3>
		                <form action="#" method="post" class="p-3 p-md-5 bg-light">
		                  <div class="form-group">
		                    <label for="message">Your Comment :</label>
		                    <textarea name="comment_message" placeholder="Write Your Comment Here . . . . . . . " id="message" cols="30" rows="5" class="form-control" required></textarea>
		                  </div>
		                  <div class="form-group">
		                    <input type="submit" name="comment" value="Post Comment" class="btn py-3 px-4 btn-primary">
		                  </div>
		                </form>
		              </div>
		            </div>
                        <?php
                    }
                    else{
                        ?>
                     
                <div class="pt-5 mt-5" style="width:100%;">            
    <div class="comment-form-wrap pt-5"  id='comment_message'>
                 
                     Please Login Or Signup To Comment</div>
                <a id="comment_signup_link" href="user/register.php">
                <input type="submit" value="SignUp" style="width:150px;" class="btn py-3 px-4 btn-primary"></a>
                    <a  href="user/login.php">
                    <input type="submit" value="Login" style="width:150px;" class="btn py-3 px-4 btn-primary" ></a>

		            </div>   
                        <?php
                    }
                    
                    ?>
			    		</div><!-- END-->
			    	</div>
			    	
                      
                   <!-- This is sidebar-->
                   
                   <?php include "includes/sidebar.php"?>
                    
	    <!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>