<?php echo form_open($form_action);?>
	<div class="dialog-content">
		<?php 
		$news_id = isset($form_data->news_id) ? $form_data->news_id : '';
		echo form_hidden('Model[news_id]', $news_id);?>
		Are you sure you want to delete this item?
	</div>
	<div class="dialog-submit">
		<input type="submit" value="Delete">
		<input type="button" id="closed" value="Cancel">
	</div>
<?php echo form_close(); ?>