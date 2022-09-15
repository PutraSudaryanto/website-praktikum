<?php 
//echo base_url()
//echo base_url("blog/post/123");
//echo anchor('news/local/123', 'My News', 'title="News title"');

echo form_open($form_action);?>
<div class="dialog-content">
	<fieldset>
		<div class="clearfix">
			<?php echo form_label('Level Name'); ?>
			<div class="desc">
				<?php 
				$level_name = isset($form_data->level_name) ? $form_data->level_name : '';
				echo form_input(array(
					'name' => 'Model[level_name]',
					'value' => $level_name,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('level_name'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Level Description'); ?>
			<div class="desc">
				<?php
				$level_desc = isset($form_data->level_desc) ? $form_data->level_desc : '';
				echo form_textarea(array(
					'name' => 'Model[level_desc]',
					'value' => $level_desc,
					'class'=> 'span-10',
					'required'=> 'true',
				));?>
				<?php echo form_error('level_desc'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Publish'); ?>
			<div class="desc">
				<?php
				$publish = isset($form_data->publish) ? $form_data->publish : 1;
				echo form_hidden('Model[publish]', 0);
				if($publish == 1)
					echo form_checkbox('Model[publish]', 1, TRUE);
				else
					echo form_checkbox('Model[publish]', 1);?>
				<?php echo form_error('publish'); ?>
			</div>
		</div>
	</fieldset>
</div>
<div class="dialog-submit">
	<?php $submit = empty($form_data) ? 'Create' : 'Save';?>
	<input type="submit" value="<?php echo $submit;?>">
	<input type="button" id="closed" value="Cancel">
</div>
<?php echo form_close(); ?>