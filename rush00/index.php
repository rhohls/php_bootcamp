<html>
	<?php
	session_start();
	
	require_once './php_functions/sidebar.php';
	require_once './php_functions/username.php';
	require_once './php_functions/getpage.php';
	require_once './php_functions/logout.php';
	require_once './php_functions/addtocart.php';
	
	// require_once './php_functions/register.php';
	

	?>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Ye Olde Shoppe</title>
</head>
<body>
	<div class="main_wrapper">
		<!-- This is ther header section -->
		<div id="header_wrapper">
			<img id="logo" src="./images/logo.png" />
				<!-- potential search bar -->
			<a id="name">Crafty Furniture</a>
			<form id="login_stuff" method="get" action="#">
				<a>Logged in as: <?php getUserName() ?></a>
				<button type="submit" name="logout" value="OK">Log Out</button></a>
			</form>
			<!-- other banner stuff -->
		</div>
		
		<!-- This is hte menubar -->		
		<div class="menu_bar">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=about">About</a></li>
				<li><a href="index.php?page=log_in">Login/Register</a></li>
				<li><a href="index.php?page=account">My Account</a></li>
				<li><a href="index.php?page=contact">Contact us</a></li>
				<li><a href="index.php?page=basket">Basket</a></li>
				<li><img src='./images/basket.png' height="50px" ></li>
				<li>
					<?php getBasketInfo() ?>
				</li>
				
				
			</ul>
		</div>
		<div class="content_wrapper">
			<!-- side bar -->
			<div id="side_bar">
				<!-- hyperlink categories to a cat page? -->
				<div id="categories_title">Room Type</div>
				<ul id="cat_list">
										
					<?php getSidebarCat() ?>

				</ul>
				<div class="padding"></div>
				<div id="categories_title2">Furniture Type</div>
				<ul id="cat_list">
					
					<?php getSidebarCat2() ?>
				
				</ul>
			</div>
			
			
			<!-- Main content -->
			<div id="products">
				<?php getPage() ?>
			</div>
			<!-- End main contents -->
			
		</div>
		<!-- <br> -->
		<!-- <div id="footer">
			this is the footer
		</div> -->
	</div>
</body>
</html>