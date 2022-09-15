<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $pageDescription;?>" />
<meta name="keywords" content="<?php echo $pageMeta;?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $pageTitle;?> | 12111075 - Dwi Putra Sudaryanto</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/superfish.css') ?>" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontello/fontello.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/flexslider.css') ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/base.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/960.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/devices/1000.css') ?>" media="only screen and (min-width: 768px) and (max-width: 1000px)" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/devices/767.css') ?>" media="only screen and (min-width: 480px) and (max-width: 767px)" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/devices/479.css') ?>" media="only screen and (min-width: 200px) and (max-width: 479px)" />
<!--[if lt IE 9]> <script type="text/javascript" src="<?php echo base_url('assets/js/customM.js') ?>"></script> <![endif]-->	
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/easing.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/1.8.2.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/carouFredSel.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/superfish.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/customM.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/flexslider-min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jtwt.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jflickrfeed.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobilemenu.js') ?>"></script>
<!--[if lt IE 9]> <script type="text/javascript" src="<?php echo base_url('assets/js/html5.js') ?>"></script> <![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets/js/mypassion.js') ?>"></script>
</head>
<body>

	<?php //begin.Body Wrapper ?>
	<div class="body-wrapper">
		<div class="controller">
			<div class="controller2">	

	<?php //begin.Header ?>
	<header id="header">
		<div class="container">
			<div class="column">
				<div class="logo">
					<a href="<?php echo site_url()?>"><img src="<?php echo base_url('assets/images/logo.png') ?>" alt="MyPassion" /></a>
				</div>
				
				<div class="search">
					<form action="<?php echo site_url('site/search');?>" method="get">
						<input type="text" name="q" value="" placeholder="Search." class="ft"/>
						<input type="submit" value="" class="fs">
					</form>
				</div>
				
				<!-- Nav -->
				<nav id="nav">
					<ul class="sf-menu">
						<li><?php echo anchor('site/index','Home')?></li>
						<li class="current"><?php echo anchor('site/contact','Contact')?></li>
						<li><?php echo anchor('site/about','About')?></li>
					</ul>					
				</nav>
				<!-- /Nav -->
			</div>
		</div>
	</header>
	<?php //end.Header ?>
	
	<?php //begin.Content ?>
	<section id="content">
		<div class="container">
			<?php //begin.Content ?>
			<div class="main-content">
				<?php echo $content;?>
			</div>
			<?php //end.Content ?>
			
			<?php //begin.Sidebar ?>
			<div class="column-one-third">
			
	<div class="sidebar">
		<h5 class="line"><span>Stay Connected.</span></h5>
		<ul class="social">
			<li>
				<a href="#" class="facebook"><i class="icon-facebook"></i></a>
				<span>6,800 <br/> <i>fans</i></span>
			</li>
			<li>
				<a href="#" class="twitter"><i class="icon-twitter"></i></a>
				<span>12,475 <br/> <i>followers</i></span>
			</li>
			<li>
				<a href="#" class="rss"><i class="icon-rss"></i></a>
				<span><i>Subscribe via rss</i></span>
			</li>
		</ul>
	</div>
	
	<div class="sidebar">
		<h5 class="line"><span>Facebook.</span></h5>
		<iframe src="https://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fommu.platform&amp;width=298&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=%23BCBCBC&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:298px; height:258px;" allowTransparency="true"></iframe>
	</div>
	
			</div>
			<?php //end.Sidebar ?>
		</div>	
	</section>
	<?php //end.Content ?>
		
	<?php //begin.Footer ?>
	<footer id="footer">
		<div class="container">
			<div class="column-one-fourth">
				<h5 class="line"><span>Tweets.</span></h5>
				<div class="twitterfeed">
					<div id="tweets"></div>
				</div>
			</div>
			<div class="column-one-fourth">
				<h5 class="line"><span>Navigation.</span></h5>
				<ul class="footnav">
					<li class="current"><?php echo anchor('site/index','Home')?></li>
					<li><?php echo anchor('site/contact','Contact')?></li>
					<li><?php echo anchor('site/about','About')?></li>
				</ul>
			</div>
			<div class="column-one-fourth">
				<h5 class="line"><span>Flickr Stream.</span></h5>
				<div class="flickrfeed">
					<ul id="basicuse" class="thumbs"><li class="hide"></li></ul>
				</div>
			</div>
			<div class="column-one-fourth">
				<h5 class="line"><span>About.</span></h5>
				<p>Aplikasi News. Web Based ini dikembangkan oleh Putra Sudaryanto (12111075), Mahasiswa Universitas Mercubuana Yogyakarta Jurusan Teknik Informasi.</p>
			</div>
			<p class="copyright">Copyright 2015. All Rights Reserved</p>
		</div>
	</footer>
	<?php //end.Footer ?>

		</div>
	</div>
	<?php //end.Body Wrapper ?>
	

</body>
</html>
