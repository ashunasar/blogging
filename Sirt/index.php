<?php  include "includes/header.php"?> 
	<div id="colorlib-page">
		<?php  include "includes/navigation.php"?> 
		<!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
                          <?php
                if(isset($_GET['page'])){
                    $page  = $_GET['page'];
                }else{
                    $page =""; 
                }

               if($page == "" || $page == 1){
                   $page_1 =0;
               }
               else{
                   $page_1 = ($page * 5) - 5;
               }
    
    
            $post_query_count  = "SELECT * FROM post";
            $post_query_count_result = mysqli_query($con,$post_query_count);
            $count_row  = mysqli_num_rows($post_query_count_result);
            $count_row = ceil($count_row/5);
                 ?>  
              
              
               
        <?php 
          $query  = "SELECT * FROM post where post_status ='published' ORDER by post_id DESC LIMIT $page_1,5";
                         $result =mysqli_query($con,$query);
                        if(!$result){
                            echo  "<h1>Error</h1>" . mysqli_error($con) ;
                        }
    
                            while($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_content = htmlspecialchars(substr($row['post_content'],0,0));
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
                                
                               
                            <?php include "post_contain.php"?>
                                
                                
                                
                                <?php
                                
                                
                            }
                            
                             
                            ?>
 
			    		</div><!-- END-->
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
                        <?php
                    for($i = 1;$i <=$count_row; $i++ ){

                    if($i == $page){
                    echo "<li class='active'><a style='border: none;' href='index.php?page={$i}'><span>{$i}</span></a></li>";
                    }
                    else{
                    echo "<li><a style='border: none;' href='index.php?page={$i}'><span>{$i}</span></a></li>";
                    }
                    } 
                              ?>
			              </ul>
			            </div>
			          </div>
			        </div>
			    	</div>
	   
                  
                  
                   <!-- This is sidebar-->
                   
                   <?php include "includes/sidebar.php"?>
            
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

<!-- Footer Of Blog-->
<?php  include "includes/footer.php"?> 