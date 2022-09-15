<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Tag</th>
			<th>Created Date</th>
		</thead>
		<tbody>
			<?php if($content != null) {
				$i = $offset+0;
				foreach($content as $key => $val) {
					$i++;
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $val->tag_name;?></td>
						<td><?php echo $this->Utility->dateFormat($val->creation_date);?></td>
					</tr>
				<?php }
			} else {?>
				<td colspan="3">Tag Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>