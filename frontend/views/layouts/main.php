<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use frontend\assets\AppAsset;

$asset = frontend\assets\AppAsset::register($this);

$baseUrl = $asset->baseUrl;
$action = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class=""> <!--use class="homepage" for corlate-->
<?php $this->beginBody() ?>

   <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart"></i> <a href="page-shopping-cart.html"><b>3 items</b></a></li>
							<li>
								<div class="dropdown choose-country">
									<a class="#" data-toggle="dropdown" href="#"><img src="<?=$baseUrl?>/img/flags/gb.png" alt="Great Britain"> UK</a>
									<ul class="dropdown-menu" role="menu">
										<li role="menuitem"><a href="#"><img src="<?=$baseUrl?>/img/flags/us.png" alt="United States"> US</a></li>
										<li role="menuitem"><a href="#"><img src="<?=$baseUrl?>/img/flags/de.png" alt="Germany"> DE</a></li>
										<li role="menuitem"><a href="#"><img src="<?=$baseUrl?>/img/flags/es.png" alt="Spain"> ES</a></li>
									</ul>
								</div>
							</li>
                                                        <li><a href="<?php Yii::$app->urlManager->createUrl(['site/login']);?>">Login</a></li>
			        	</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="index.html"><img src="<?=$baseUrl?>/img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                                                <li <?php if($action == 'index'){?>class="active"<?php }?>>
                                                    <a href="<?php Yii::$app->urlManager->createUrl(['site/index']);?>">Home</a>
						</li>
						<li <?php if($action == 'contact'){?>class="active"<?php }?>>
							<a href="features.html">Features</a>
						</li>
						<li class="has-submenu">
							<a href="#">Pages +</a>
							<div class="mainmenu-submenu">
								<div class="mainmenu-submenu-inner"> 
									<div>
										<h4>Homepage</h4>
										<ul>
											<li><a href="index.html">Homepage (Sample 1)</a></li>
											<li><a href="page-homepage-sample.html">Homepage (Sample 2)</a></li>
										</ul>
										<h4>Services & Pricing</h4>
										<ul>
											<li><a href="page-services-1-column.html">Services/Features (Rows)</a></li>
											<li><a href="page-services-3-columns.html">Services/Features (3 Columns)</a></li>
											<li><a href="page-services-4-columns.html">Services/Features (4 Columns)</a></li>
											<li><a href="page-pricing.html">Pricing Table</a></li>
										</ul>
										<h4>Team & Open Vacancies</h4>
										<ul>
											<li><a href="page-team.html">Our Team</a></li>
											<li><a href="page-vacancies.html">Open Vacancies (List)</a></li>
											<li><a href="page-job-details.html">Open Vacancies (Job Details)</a></li>
										</ul>
									</div>
									<div>
										<h4>Our Work (Portfolio)</h4>
										<ul>
											<li><a href="page-portfolio-2-columns-1.html">Portfolio (2 Columns, Option 1)</a></li>
											<li><a href="page-portfolio-2-columns-2.html">Portfolio (2 Columns, Option 2)</a></li>
											<li><a href="page-portfolio-3-columns-1.html">Portfolio (3 Columns, Option 1)</a></li>
											<li><a href="page-portfolio-3-columns-2.html">Portfolio (3 Columns, Option 2)</a></li>
											<li><a href="page-portfolio-item.html">Portfolio Item (Project) Description</a></li>
										</ul>
										<h4>General Pages</h4>
										<ul>
											<li><a href="page-about-us.html">About Us</a></li>
											<li><a href="page-contact-us.html">Contact Us</a></li>
											<li><a href="page-faq.html">Frequently Asked Questions</a></li>
											<li><a href="page-testimonials-clients.html">Testimonials & Clients</a></li>
											<li><a href="page-events.html">Events</a></li>
											<li><a href="page-404.html">404 Page</a></li>
											<li><a href="page-sitemap.html">Sitemap</a></li>
											<li><a href="page-login.html">Login</a></li>
											<li><a href="page-register.html">Register</a></li>
											<li><a href="page-password-reset.html">Password Reset</a></li>
											<li><a href="page-terms-privacy.html">Terms & Privacy</a></li>
											<li><a href="page-coming-soon.html">Coming Soon</a></li>
										</ul>
									</div>
									<div>
										<h4>eShop</h4>
										<ul>
											<li><a href="page-products-3-columns.html">Products listing (3 Columns)</a></li>
											<li><a href="page-products-4-columns.html">Products listing (4 Columns)</a></li>
											<li><a href="page-products-slider.html">Products Slider</a></li>
											<li><a href="page-product-details.html">Product Details</a></li>
											<li><a href="page-shopping-cart.html">Shopping Cart</a></li>
										</ul>
										<h4>Blog</h4>
										<ul>
											<li><a href="page-blog-posts.html">Blog Posts (List)</a></li>
											<li><a href="page-blog-post-right-sidebar.html">Blog Single Post (Right Sidebar)</a></li>
											<li><a href="page-blog-post-left-sidebar.html">Blog Single Post (Left Sidebar)</a></li>
											<li><a href="page-news.html">Latest & Featured News</a></li>
										</ul>
									</div>
								</div><!-- /mainmenu-submenu-inner -->
							</div><!-- /mainmenu-submenu -->
						</li>
						<li>
							<a href="credits.html">Credits</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>

      <?=$content?>

	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-footer col-md-3 col-xs-6">
		    			<h3>Our Latest Work</h3>
		    			<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="page-portfolio-item.html"><img src="<?=$baseUrl?>/img/portfolio6.jpg" alt="Project Name"></a>
							</div>
						</div>
		    		</div>
		    		<div class="col-footer col-md-3 col-xs-6">
		    			<h3>Navigate</h3>
		    			<ul class="no-list-style footer-navigate-section">
		    				<li><a href="page-blog-posts.html">Blog</a></li>
		    				<li><a href="page-portfolio-3-columns-2.html">Portfolio</a></li>
		    				<li><a href="page-products-3-columns.html">eShop</a></li>
		    				<li><a href="page-services-3-columns.html">Services</a></li>
		    				<li><a href="page-pricing.html">Pricing</a></li>
		    				<li><a href="page-faq.html">FAQ</a></li>
		    			</ul>
		    		</div>
		    		
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Contacts</h3>
		    			<p class="contact-us-details">
	        				<b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/>
	        				<b>Phone:</b> +44 123 654321<br/>
	        				<b>Fax:</b> +44 123 654321<br/>
	        				<b>Email:</b> <a href="mailto:getintoutch@yourcompanydomain.com">getintoutch@yourcompanydomain.com</a>
	        			</p>
		    		</div>
		    		<div class="col-footer col-md-2 col-xs-6">
		    			<h3>Stay Connected</h3>
		    			<ul class="footer-stay-connected no-list-style">
		    				<li><a href="#" class="facebook"></a></li>
		    				<li><a href="#" class="twitter"></a></li>
		    				<li><a href="#" class="googleplus"></a></li>
		    			</ul>
		    		</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2013 mPurpose. All rights reserved.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>
 

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
