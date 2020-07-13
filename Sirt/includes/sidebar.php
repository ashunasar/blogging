<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="search.php" method="post" class="search-form">
	                <div class="form-group">
	                  
	                  <input type="text" id="search" name="search" class="form-control" placeholder="Search Posts Here" required>
	                  
                    <button style="background-color: transparent;
                    border: transparent;
                    height: 100%;" class="icon btn btn-default" name="submit">
                       <span class="icon-search"></span>
                       </button>
                      
	                </div>
	              </form>       
	            </div>
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Categories</h3>
	              <ul class="categories">
                
                   <?php
                      
                      $query  = "select * from categories";
                      $result = mysqli_query($con,$query);
                       
                      while($row = mysqli_fetch_assoc($result)){
                          $cat_id = $row['cat_id'];
                          $cat_title = $row['cat_title'];
                          ?>
                          <li><a href="category.php?category=<?php echo $cat_id;?>"><?php echo $cat_title;?></a></li>
                          <?php
                          
                      }
                      
                      ?>
	              </ul>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Popular Articles</h3>
	              <?php
                $popular_post_query="SELECT * FROM post where post_status='published' ORDER BY post_views DESC LIMIT 0,3";
                $popular_post = mysqli_query($con,$popular_post_query);
                    
                 while($row =mysqli_fetch_assoc($popular_post)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_content = substr($row['post_content'],0,100);
                            $post_comment_count = $row['post_comment_count'];
                            $post_image = $row['post_image'];
                            $post_date = $row['post_date'];
                            $post_views = $row['post_views'];
                     ?>
                <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/<?php echo $post_image;?>);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span><?php echo $post_date;?></a></div>
	                    <div><a href="author.php?author=<?php echo $post_author;?>"><span class="icon-person"></span><?php echo $post_author;?></a></div>
	                    <div><a href="#"><span class="icon-chat"></span><?php echo $post_comment_count;?></a></div>
	                  </div>
	                </div>
	              </div>
                     <?php
                 }
                     
	              ?>

	            </div>

<!--
	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Tag Cloud</h3>
	              <ul class="tagcloud">
	                <a href="#" class="tag-cloud-link">animals</a>
	                <a href="#" class="tag-cloud-link">human</a>
	                <a href="#" class="tag-cloud-link">people</a>
	                <a href="#" class="tag-cloud-link">cat</a>
	                <a href="#" class="tag-cloud-link">dog</a>
	                <a href="#" class="tag-cloud-link">nature</a>
	                <a href="#" class="tag-cloud-link">leaves</a>
	                <a href="#" class="tag-cloud-link">food</a>
	              </ul>
	            </div>
-->

<!--
							<div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
								<div class="overlay"></div>
								<h3 class="mb-4 sidebar-heading">Newsletter</h3>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
	              <form action="#" class="subscribe-form">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Email Address">
	                  <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
	                </div>
	              </form>
	            </div>
-->

<!--
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Archives</h3>
	              <ul class="categories">
	              	<li><a href="#">December 2018 <span>(10)</span></a></li>
	                <li><a href="#">September 2018 <span>(6)</span></a></li>
	                <li><a href="#">August 2018 <span>(8)</span></a></li>
	                <li><a href="#">July 2018 <span>(2)</span></a></li>
	                <li><a href="#">June 2018 <span>(7)</span></a></li>
	                <li><a href="#">May 2018 <span>(5)</span></a></li>
	              </ul>
	            </div>
-->


<!--
	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Paragraph</h3>
	              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
	            </div>
-->
	          </div><!-- END COL -->