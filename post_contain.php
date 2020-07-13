 <div class="col-md-12">
                            
            <div class="blog-entry-2 ftco-animate">
            <a href="post.php?p_id=<?php echo $post_id;?>" class="img" style="background-image: url(images/<?php echo $post_image;?>);"></a>
            <div class="text pt-4">
				              <h3 class="mb-4"><a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h3>
		 		              <p class="mb-4"><?php echo $post_content;?><big></big></p>
				              <div class="author mb-4 d-flex align-items-center">
				            		<a href="#" class="img" style="background-image: url(images/<?php echo $user_image;?>);"></a>
				            		<div class="ml-3 info">
				            			<span>Written by </span><br>
				            			<h3><a href="author.php?author=<?php echo $post_author;?>"><?php echo $post_author;?></a>, <span>June 28, 2019</span></h3>
				            		</div>
				            	</div>
				              <div class="meta-wrap d-md-flex align-items-center">
				              	<div class="half order-md-last text-md-right">
					              	<p class="meta">
<!--					              		<span><i class="icon-heart"></i>3</span>-->
					              		<span><i class="icon-eye"></i><?php echo $post_views;?></span>
					              		<span><i class="icon-comment"></i><?php echo $post_comment_count;?></span>
					              	</p>
				              	</div>
				              	<div class="half">
					              	<p><a href="post.php?p_id=<?php echo $post_id;?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Read This post</a></p>
				              	</div>
				              </div>
				            </div>
	    						</div>
	    					</div>