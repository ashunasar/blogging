<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
                   
                   <?php
                    if(isset($_COOKIE['user_role'])){
                        ?>
                    <li><a href="admin/index">Admin Control</a></li>
                        <?php
                    }
                    else{
                        ?>
                    <li><a href="user/register.php">Sign Up</a></li>
                    <li><a href="user/login.php">Sign In</a></li>
                        <?php
                    }
                    
                    ?>
                   
                   

					<li><a href="#">Contact</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<h1 id="colorlib-logo" class="mb-4"><a href="index.php" style="background-image: url(images/bg_1.jpg);">SIRT<span> </span></a></h1>
				<div class="mb-4">
<!--
					<h3>Subscribe for newsletter</h3>
					<form action="#" class="colorlib-subscribe-form">
            <div class="form-group d-flex">
            	<div class="icon"><span class="icon-paper-plane"></span></div>
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
          </form>
-->
				</div>
				<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!--	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> This Website is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#">Undefiend Programmer</a>-->
 This WebSite Is Made BY Ashu 
  
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</aside> 