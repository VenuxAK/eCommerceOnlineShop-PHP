<!-- Start Header Area -->
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="/"><img src="<?= BASE_URL ?>/views/assets/img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
						<li class="nav-item">
							<a class="nav-link" href="/categories">Categories</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/products">Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/products/checkout">Product Checkout</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/contact">Contact</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">
								<span class="ti-user"></span>
							</a>
							<ul class="dropdown-menu">
								<?php if(!isLoggedIn()) : ?>
									<li class="nav-item">
										<a class="nav-link" href="/login">Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/register">Register</a>
									</li>
								<?php else : ?>
									<li class="nav-item">
										<a class="nav-link" href="/profile">Profile</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/logout">Logout</a>
									</li>
								<?php endif ?>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
							<a href="/cart" class="cart">
								<span class="ti-bag"></span>
							</a>
						</li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>
<!-- End Header Area -->