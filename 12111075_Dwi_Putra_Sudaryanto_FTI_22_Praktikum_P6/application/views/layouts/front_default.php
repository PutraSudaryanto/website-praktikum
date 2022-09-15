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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/superfish.css') ?>" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/fontello/fontello.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/flexslider.css') ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/ui.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/base.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/style.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/960.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/devices/1000.css') ?>" media="only screen and (min-width: 768px) and (max-width: 1000px)" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/devices/767.css') ?>" media="only screen and (min-width: 480px) and (max-width: 767px)" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_front/css/devices/479.css') ?>" media="only screen and (min-width: 200px) and (max-width: 479px)" />
<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]> <script type="text/javascript" src="<?php echo base_url('assets_front/js/customM.js') ?>"></script> <![endif]-->
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
					<a href="<?php echo site_url()?>"><img src="<?php echo base_url('assets_front/images/logo.png') ?>" alt="MyPassion" /></a>
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
						<li class="current"><a href="<?php echo site_url()?>">Home.</a></li>
						<?php
						$mainmenu = $this->NewsCategoryModel->findAll(array(
							'condition' => array(
								'publish' => 1,
								'parent' => 0,
							),
						));
						foreach($mainmenu as $key => $val) {?>
							<li>
								<a href="<?php echo site_url('site/category/'.$val->cat_id.'/'.$this->Utility->getUrlTitle($val->cat_name))?>" title="<?php echo $val->cat_name;?>"><?php echo $val->cat_name;?></a>
								<?php 
								$submenu = $this->NewsCategoryModel->findAll(array(
									'condition' => array(
										'publish' => 1,
										'parent' => $val->cat_id,
									),
								));
								if($submenu != null) {
									echo '<ul>';
									foreach($submenu as $key => $row) {?>
										<li><i class="icon-right-open"></i><a href="<?php echo site_url('site/category/'.$row->cat_id.'/'.$this->Utility->getUrlTitle($row->cat_name))?>" title="<?php echo $row->cat_name;?>"><?php echo $row->cat_name;?></a></li>
								<?php }
									echo '</ul>';
								}?>
							</li>
						<?php }?>
						<li><a href="<?php echo site_url('site/contact')?>">Contact</a></li>
					</ul>					
				</nav>
				<!-- /Nav -->
			</div>
		</div>
	</header>
	<?php //end.Header ?>
	
	<?php //begin.Slider ?>
	<?php if(!in_array(($this->uri->segment(1).'/'.$this->uri->segment(2)), array('site/view','site/search','site/category','site/contact'))) {?>
	<section id="slider">
		<div class="container">
			<?php
				$popular = $this->NewsModel->findAll(array(
					//'select' => 'publish',
					'condition' => array(
						'publish' => 1,
					),
					'order' => array(
						'view' => 'desc',
					),
				), 3, 0);
			?>
			<div class="main-slider">
				<div class="badg">
					<p><a href="#">Popular.</a></p>
				</div>
				<div class="flexslider">
					<ul class="slides">
						<?php foreach($popular as $key => $val) {?>
						<li>
							<img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 540, 372, 1);?>" alt="<?php echo $val->news_title;?>" />
							<p class="flex-caption"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a> <?php echo $this->Utility->shortText($val->news_body);?> </p>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<?php
				$latest = $this->NewsModel->findAll(array(
					//'select' => 'publish',
					'condition' => array(
						'publish' => 1,
					),
					'order' => array(
						'news_id' => 'desc',
					),
				), 3, 0);
			?>
			<?php 
			$i = 0;
			foreach($latest as $key => $val) {
				$i++;
				if($i == 1) {?>
					<div class="slider2">
						<div class="badg">
							<p><a href="#">Latest.</a></p>
						</div>
						<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 380, 217, 1);?>" alt="<?php echo $val->news_title;?>" /></a>
						<p class="caption"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a> <?php echo $this->Utility->shortText($val->news_body);?> </p>
					</div>				
				<?php } else {?>			
					<div class="slider3">
						<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 180, 135, 1);?>" alt="<?php echo $val->news_title;?>" /></a>
						<p class="caption"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a></p>
					</div>				
			<?php }
			}?>			
		</div>    
	</section>
	<?php }?>
	<?php //end.Slider ?>
	
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
					<?php
					$mainmenu = $this->NewsCategoryModel->findAll(array(
						'condition' => array(
							'publish' => 1,
							'parent' => 0,
						),
						'order' => array(
							'cat_id' => 'desc',
						),
					));
					foreach($mainmenu as $key => $val) {?>
						<li><a href="#"><i class="icon-right-open"></i><?php echo $val->cat_name;?></a></li>
					<?php }?>
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
	
<script type="text/javascript" src="<?php echo base_url('assets_front/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/easing.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/1.8.2.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/carouFredSel.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/superfish.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/customM.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/flexslider-min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/jtwt.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/jflickrfeed.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_front/js/mobilemenu.js') ?>"></script>
<!--[if lt IE 9]> <script type="text/javascript" src="<?php echo base_url('assets_front/js/html5.js') ?>"></script> <![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets_front/js/mypassion.js') ?>"></script>
	

</body>
</html>
