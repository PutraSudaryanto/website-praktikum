<?php if(empty($dialogDetail)) {?>
	<div id="<?php echo $this->uri->segment(2);?>" class="clearfix">
		<h1 class="small"><?php echo $pageTitle;?></h1>
		<?php if($pageDescription != '') {?>
		<p class="intro"><?php echo $pageDescription;?></p>
		<?php }?>
		<?php if(!empty($contentMenu) && ($contentMenu != '')) {?>
			<div class="contentmenu clearfix">
			<ul class="left clearfix">
			<?php foreach($contentMenu as $key => $val) {
				echo '<li>'.anchor($val, '<span class="icons">C</span> '.$key, 'title="'.$key.'"').'</li>';
			}?>
			</ul>
			</div>
		<?php }?>
		<?php echo $content;?>
	</div>
	
<?php } else {?>
	<div id="<?php echo ($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) == 'admin/site/login') ? $this->uri->segment(3) : $this->uri->segment(2);?>" class="<?php echo !empty($dialogWidth) ? 'boxed' : 'clearfix';?>">
		<?php if(!empty($dialogWidth)) {?>
			<div class="dialog-header"><h1><?php echo $pageTitle;?></h1></div>
		<?php }?>
		<?php echo $content;?>
	</div>
<?php }?>