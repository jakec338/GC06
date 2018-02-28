<?php 
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
?>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
	<h5 class="my-0 mr-md-auto text-dark">Auction</h5>
	<?php if(isset($_SESSION['logged'])){?>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="profile.php">Home</a>
			<?php if($_SESSION['logged']=="buyer" || isset($_SESSION['is_both'])){ ?>
				<a class="p-2 text-dark" href="buy.php">Buy</a>
			<?php } ?>
			<?php if($_SESSION['logged']=="seller" || isset($_SESSION['is_both'])){ ?>
				<a class="p-2 text-dark" href="#">Sell</a>
			<?php } ?>
			<a class="btn btn-outline-primary" href="logout.php">Log out</a>
		</nav>
	<?php
	} else {?>
		<a class="btn btn-outline-primary" href="signup.php">Sign up</a>
		<a class="btn btn-outline-primary" href="index.php">Sign in</a>
	<?php }?>
</div>