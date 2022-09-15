<?php 
//echo base_url()
//echo base_url("blog/post/123");
//echo anchor('news/local/123', 'My News', 'title="News title"');

echo form_open($form_action);?>
<div class="dialog-content">
	<fieldset>
		<div class="clearfix">
			<?php echo form_label('Tag Name'); ?>
			<div class="desc">
				<?php 
				$tag_name = isset($form_data->tag_name) ? $form_data->tag_name : '';
				echo form_input(array(
					'name' => 'Model[tag_name]',
					'value' => $tag_name,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('tag_name'); ?>
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