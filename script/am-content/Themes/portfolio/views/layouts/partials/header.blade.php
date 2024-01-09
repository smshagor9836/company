<section class="header" id="hero_bg_img" style="background-image: url({{ content('portfolio_hero','hero_bg_img') }});">
	<div class="header-content">
		<div class="container" id="portfolio_header">

			<!--Nav Area Start-->
			<div class="header-top">
				<nav class="navbar-expand-lg navigation">
					<div class="row">
						<div class="col-lg-2">
							<a href="#" class="header-logo">
								<img id="logo" alt="" src="{{ content('portfolio_header','logo') }}" class="lazy img-fluid round">
							</a>
							<button class="navbar-toggler nav-btn" type="button" data-toggle="collapse" data-target="#mainmenu">
								<span></span>
								<span></span>
								<span></span>
							</button>
						</div>
						<div class="col-lg-10">
							<div class="collapse navbar-collapse main-menu float-md-right" id="mainmenu">

								<ul>
									  <?php echo Menu('Header','submenu','','','',false); ?>
									
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
			<!--Nav Area End-->

			<!--Header Info Area Start-->
			<div id="portfolio_hero">
				<div class="table">
					<div class="hero-body table-cell">
						<h4 id="hello_title">{{ content('portfolio_hero','hello_title') }}</h4>
						<h1><span id="hero_first_title">{{ content('portfolio_hero','hero_first_title') }}</span>
							<span id="hero_des" class="animate-typing" data-animate-loop="true" data-type-speed="100" data-remove-delay="2000" data-remove-speed="50">
								{{ content('portfolio_hero','hero_des') }}
							</span>
						</h1>

						<div class="hero-btn-area mt-4">
							<a id="button_first_link" href="{{ content('portfolio_hero','button_first_link') }}" class="btn-fill"><span id="button_first">{{ content('portfolio_hero','button_first') }}</span></a>
							<a id="button_secound_link" href="{{ content('portfolio_hero','button_secound_link') }}" class="btn-blank ml-2"><span id="button_secound">{{ content('portfolio_hero','button_secound') }}</span></a>
						</div>

						<!--Header Info Area End-->
					</div>
				</div>
			</div>
			<div class="hero-bottom text-center">
				<a href="#portfolio_about" class="slide-down"><i class="fas fa-angle-double-down"></i></a>
			</div>
		</div>
	</div>
</section>