<?php
$popular = $this->NewsModel->findAll(array(
	//'select' => 'publish',
	'condition' => array(
		'publish' => 1,
	),
	'order' => array(
		'view' => 'desc',
	),
), 4, 4);
if($popular != null) {?>
<?php //begin.Popular ?>
<div class="column-one-third">
	<h5 class="line"><span>Popular News.</span></h5>
	<div class="outertight">
		<ul class="block">
			<?php foreach($popular as $key => $val) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');
			?>
			<li>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }?>
		</ul>
	</div>
</div>
<?php }?>
<?php //end.Popular ?>

<?php
$latest = $this->NewsModel->findAll(array(
	//'select' => 'publish',
	'condition' => array(
		'publish' => 1,
	),
	'order' => array(
		'news_id' => 'desc',
	),
), 4, 4);
if($latest != null) {?>
<?php //end.HotNews ?>
<div class="column-one-third">
	<h5 class="line"><span>Latest News.</span></h5>
	<div class="outertight m-r-no">
		<ul class="block">
			<?php foreach($latest as $key => $val) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');
			?>
			<li>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }?>
		</ul>
	</div>		
</div>
<?php }?>
<?php //end.HotNews ?>

<?php
$mobile = $this->NewsModel->findAll(array(
	//'select' => 'publish',
	'condition' => array(
		'publish' => 1,
		'cat_id' => 3,
	),
	'order' => array(
		'news_id' => 'desc',
	),
), 6, 0);
if($mobile != null) {?>
<?php //begin.Life Style ?>
<div class="column-two-third">
	<h5 class="line">
		<span>Aplikasi Mobile News.</span>
		<div class="navbar">
			<a id="next1" class="next" href="javascript:void(0);"><span></span></a>	
			<a id="prev1" class="prev" href="javascript:void(0);"><span></span></a>
		</div>
	</h5>

	<?php 
	$i = 0;
	foreach($mobile as $key => $val) {
	$i++;
	if($i == 1) {
		if($val->news_photo != '')
			$media = base_url('public/'.$val->news_photo);
		else
			$media = base_url('public/default.png');?>	
	<div class="outertight">
		<img src="<?php echo $this->Utility->getTimThumb($media, 300, 162, 1);?>" alt="<?php echo $val->news_title;?>" />
		<h6 class="regular"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a></h6>
		<span class="meta"><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
		<p><?php echo $this->Utility->shortText($val->news_body, 200);?></p>
	</div>
	<?php }
	}?>
	
	<div class="outertight m-r-no">
		
		<ul class="block" id="carousel">
			<?php 
			$i = 0;
			foreach($mobile as $key => $val) {
			$i++;
			if($i != 1) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');?>
			<li>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }
			}?>
		</ul>
	</div>
</div>
<?php }?>
<?php //end.Life Style ?>

<?php
$gadget = $this->NewsModel->findAll(array(
	//'select' => 'publish',
	'condition' => array(
		'publish' => 1,
		'cat_id' => 2,
	),
	'order' => array(
		'news_id' => 'desc',
	),
), 8, 0);
if($gadget != null) {?>
<?php //begin.World News ?>
<div class="column-two-third">
	<h5 class="line">
		<span>Gadget News.</span>
		<div class="navbar">
			<a id="next2" class="next" href="javascript:void(0);"><span></span></a>	
			<a id="prev2" class="prev" href="javascript:void(0);"><span></span></a>
		</div>
	</h5>
	
	<div class="outerwide">
		<ul class="wnews" id="carousel2">
			<?php 
			$i = 0;
			foreach($gadget as $key => $val) {
			$i++;
			if($i <= 4) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');?>
			<li>
				<img src="<?php echo $this->Utility->getTimThumb($media, 300, 162, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" />
				<h6 class="regular"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><?php echo $val->news_title;?></a></h6>
				<span class="meta"><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
				<p><?php echo $this->Utility->shortText($val->news_body);?></p>
			</li>
			<?php }
			}?>
		</ul>
	</div>
	<div style="clear: both;"></div>
	
	<div class="outerwide">
		<ul class="block2">
			<?php 
			$i = 0;
			foreach($gadget as $key => $val) {
			$i++;
			if($i > 4) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');?>
			<li <?php echo ($i % 2) == 0 ? 'class="m-r-no"' : '';?>>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }
			}?>
		</ul>
	</div>
</div>
<?php }?>
<?php //end.World News ?>

<?php //begin.Business and Sport ?>
<div class="column-two-third">
	<?php
	$game = $this->NewsModel->findAll(array(
		//'select' => 'publish',
		'condition' => array(
			'publish' => 1,
			'cat_id' => 5,
		),
		'order' => array(
			'news_id' => 'desc',
		),
	), 3, 0);
	if($game != null) {?>
	<div class="outertight">
		<h5 class="line"><span>Game News.</span></h5>

		<?php 
		$i = 0;
		foreach($game as $key => $val) {
		$i++;
		if($i == 1) {
			if($val->news_photo != '')
				$media = base_url('public/'.$val->news_photo);
			else
				$media = base_url('public/default.png');?>
		<div class="outertight m-r-no">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="<?php echo $this->Utility->getTimThumb($media, 300, 162, 1);?>" alt="MyPassion" />
					</li>
				</ul>
			</div>
			
			<h6 class="regular"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a></h6>
			<span class="meta"><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
			<p><?php echo $this->Utility->shortText($val->news_body, 200);?></p>
		</div>
		<?php }
		}?>
		
		<ul class="block">
			<?php
			$i = 0;
			foreach($game as $key => $val) {
			$i++;
			if($i != 1) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');?>	
			<li>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }
			}?>
		</ul>
	</div>
	<?php }?>
	
	<?php
	$startup = $this->NewsModel->findAll(array(
		//'select' => 'publish',
		'condition' => array(
			'publish' => 1,
			'cat_id' => 1,
		),
		'order' => array(
			'news_id' => 'desc',
		),
	), 3, 0);
	if($startup != null) {?>
	<div class="outertight m-r-no">
		<h5 class="line"><span>Startup News.</span></h5>

		<?php 
		$i = 0;
		foreach($startup as $key => $val) {
		$i++;
		if($i == 1) {
			if($val->news_photo != '')
				$media = base_url('public/'.$val->news_photo);
			else
				$media = base_url('public/default.png');?>
		<div class="outertight m-r-no">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="<?php echo $this->Utility->getTimThumb($media, 300, 162, 1);?>" alt="MyPassion" />
					</li>
				</ul>
			</div>
			
			<h6 class="regular"><a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a></h6>
			<span class="meta"><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
			<p><?php echo $this->Utility->shortText($val->news_body, 200);?></p>
		</div>
		<?php }
		}?>
		
		<ul class="block">
			<?php
			$i = 0;
			foreach($startup as $key => $val) {
			$i++;
			if($i != 1) {
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');?>	
			<li>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="<?php echo $val->news_title;?>" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }
			}?>
		</ul>
	</div>
	<?php }?>
</div>
<?php //end.Business and Sport ?>