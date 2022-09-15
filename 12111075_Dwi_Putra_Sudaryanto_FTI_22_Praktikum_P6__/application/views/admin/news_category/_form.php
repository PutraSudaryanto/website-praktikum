<?php 
//echo base_url()
//echo base_url("blog/post/123");
//echo anchor('news/local/123', 'My News', 'title="News title"');

echo form_open($form_action);?>

<div class="dialog-content">
	<fieldset>
		<div class="clearfix">
			<?php echo form_label('Parent'); ?>
			<div class="desc">
				<?php 
				$parent = isset($form_data->parent) ? $form_data->parent : '';
				echo form_dropdown('Model[parent]', $form_category, $parent);?>
				<?php echo form_error('parent'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Category Name'); ?>
			<div class="desc">
				<?php 
				$cat_name = isset($form_data->cat_name) ? $form_data->cat_name : '';
				echo form_input(array(
					'name' => 'Model[cat_name]',
					'value' => $cat_name,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('cat_name'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Category Description'); ?>
			<div class="desc">
				<?php
				$cat_desc = isset($form_data->cat_desc) ? $form_data->cat_desc : '';
				echo form_textarea(array(
					'name' => 'Model[cat_desc]',
					'value' => $cat_desc,
					'class'=> 'span-10',
					'required'=> 'true',
				));?>
				<?php echo form_error('cat_desc'); ?>
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
		<div class="clearfix">
			<label></label>
			<div class="desc">
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