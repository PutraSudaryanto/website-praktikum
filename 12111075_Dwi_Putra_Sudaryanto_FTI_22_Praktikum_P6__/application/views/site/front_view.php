<div class="column-two-third single">
	<div class="flexslider">
		<?php 
		if($content->news_photo != '')
			$media = base_url('public/'.$content->news_photo);
		else
			$media = base_url('public/default.png');
		?>
		<ul class="slides">
			<li>
				<img src="<?php echo $this->Utility->getTimThumb($media, 640, 420, 1);?>" alt="<?php echo $content->news_title;?>" />
			</li>
		</ul>
	</div>
	
	<h6 class="title"><?php echo $content->news_title;?></h6>
	
	<span class="meta"><?php echo $this->Utility->dateFormat($content->creation_date, 'j F Y', true);?></span>
	
	<?php echo $content->news_body;?>

	<ul class="sharebox">
		<li><a href="#"><span class="twitter">Tweet</span></a></li>
		<li><a href="#"><span class="pinterest">Pin it</span></a></li>
		<li><a href="#"><span class="facebook">Like</span></a></li>
	</ul>
                        
	<div class="relatednews">
		<h5 class="line"><span>Related News.</span></h5>
		<ul>
			<li>
				<a href="<?php echo site_url('site/view')?>"><img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 140, 86, 1);?>" alt="MyPassion" /></a>
				<p>
					<span>26 May, 2013.</span>
					<a href="<?php echo site_url('site/view')?>">Blandit Rutrum, Erat et Sagittis.</a>
				</p>
			</li>
			<li>
				<a href="<?php echo site_url('site/view')?>"><img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 140, 86, 1);?>" alt="MyPassion" /></a>
				<p>
					<span>26 May, 2013.</span>
					<a href="<?php echo site_url('site/view')?>">Blandit Rutrum, Erat et Sagittis.</a>
				</p>
			</li>
			<li>
				<a href="<?php echo site_url('site/view')?>"><img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 140, 86, 1);?>" alt="MyPassion" /></a>
				<p>
					<span>26 May, 2013.</span>
					<a href="<?php echo site_url('site/view')?>">Blandit Rutrum, Erat et Sagittis.</a>
				</p>
			</li>
			<li>
				<a href="<?php echo site_url('site/view')?>"><img src="<?php echo $this->Utility->getTimThumb(base_url('public/default.png'), 140, 86, 1);?>" alt="MyPassion" /></a>
				<p>
					<span>26 May, 2013.</span>
					<a href="<?php echo site_url('site/view')?>">Blandit Rutrum, Erat et Sagittis.</a>
				</p>
			</li>
		</ul>
	</div>
	
</div>
