<div class="dialog-content">
	<table class="detail-view">
		<?php foreach($content as $key => $val) {
			if(!in_array($key, array('user_id'))) {
		?>
		<tr>
			<th><?php echo $key;?></th>
			<td><?php echo $val;?></td>
		</tr>
		<?php }
		}?>
	</table>
</div>
<div class="dialog-submit">
	<input type="button" id="closed" value="Cancel">
</div>	