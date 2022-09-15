<table class="detail-view">
	<?php foreach($content as $key => $val) {
		if(!in_array($key, array('news_id'))) {
	?>
	<tr>
		<th><?php echo $key;?></th>
		<td><?php echo $val;?></td>
	</tr>
	<?php }
	}?>
</table>