<?php 
//echo base_url()
//echo base_url("blog/post/123");
//echo anchor('news/local/123', 'My News', 'title="News title"');

echo form_open_multipart($form_action);?>
	<fieldset>
		<div class="clearfix">
			<?php echo form_label('Category'); ?>
			<div class="desc">
				<?php 
				$cat_id = isset($form_data->cat_id) ? $form_data->cat_id : '';
				echo form_dropdown('Model[cat_id]', $form_category, $cat_id);?>
				<?php echo form_error('cat_id'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Title'); ?>
			<div class="desc">
				<?php 
				$news_title = isset($form_data->news_title) ? $form_data->news_title : '';
				echo form_input(array(
					'name' => 'Model[news_title]',
					'value' => $news_title,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('news_title'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('News'); ?>
			<div class="desc">
				<?php
				$news_body = isset($form_data->news_body) ? $form_data->news_body : '';
				echo form_textarea(array(
					'name' => 'Model[news_body]',
					'value' => $news_body,
					'class'=> 'span-10 medium',
					'required'=> 'true',
				));?>
				<?php echo form_error('news_body'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Quote'); ?>
			<div class="desc">
				<?php
				$news_quote = isset($form_data->news_quote) ? $form_data->news_quote : '';
				echo form_textarea(array(
					'name' => 'Model[news_quote]',
					'value' => $news_quote,
					'class'=> 'span-10 small',
				));?>
				<?php echo form_error('news_quote'); ?>
			</div>
		</div>
		<?php /*
		<div class="clearfix">
			<?php echo form_label('Publish Date'); ?>
			<div class="desc">
				<?php
				$published_date = isset($form_data->published_date) ? $form_data->published_date : '';
				echo form_input(array(
					'name' => 'Model[published_date]',
					'value' => $published_date,
					'class'=> 'span-4',
					'required'=> 'true',
				));?>
				<?php echo form_error('published_date'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Photo'); ?>
			<div class="desc">
				<?php echo form_upload('userfile');?>
				<?php echo form_error('userfile'); ?>
			</div>
		</div>
		*/?>
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
				<?php $submit = empty($form_data) ? 'Create' : 'Save';?>
				<input type="submit" value="<?php echo $submit;?>">
			</div>
		</div>
	</fieldset>
<?php echo form_close(); ?>