<?php
	//echo $this->uri->segment(4);
	//print_r($content);
	//echo $paging;
?>
<?php //begin.World News ?>
<div class="column-two-third">
	<h5 class="line">
		<span><?php echo $pageTitle;?></span>
	</h5>
	
	<div class="outerwide">
		<?php if($content != null) {?>
		<ul class="block2">
			<?php 
			$i = 0;
			foreach($content as $key => $val) {
				$i++;
				if($val->news_photo != '')
					$media = base_url('public/'.$val->news_photo);
				else
					$media = base_url('public/default.png');?>
			<li <?php echo ($i % 2) == 0 ? 'class="m-r-no"' : '';?>>
				<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>"><img src="<?php echo $this->Utility->getTimThumb($media, 140, 86, 1);?>" alt="MyPassion" class="alignleft" /></a>
				<p>
					<span><?php echo $this->Utility->dateFormat($val->creation_date, 'j F Y');?></span>
					<a href="<?php echo site_url('site/view/'.$val->news_id.'/'.$this->Utility->getUrlTitle($val->news_title))?>" title="<?php echo $val->news_title;?>"><?php echo $val->news_title;?></a>
				</p>
			</li>
			<?php }?>
		</ul>
		<?php } else {?>
			Data Not Found
		<?php }?>
	</div>
</div>	
<?php //end.World News ?>