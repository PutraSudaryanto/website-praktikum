<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th>User</th>
			<th>Created Date</th>
			<th>Publish</th>
			<th class="button-column">Action</th>
		</thead>
		<tbody>
			<?php if($content != null) {
				$i = $offset+0;
				foreach($content as $key => $val) {
					$i++;
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $val->level_name;?></td>
						<td><?php echo $val->level_desc;?></td>
						<td><?php echo $val->user;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->publish);?></td>
						<td class="button-column">
							<?php echo anchor('admin/userlevel/edit/'.$val->level_id, 'Update', 'title="Update" class="update"');?>
							<?php echo anchor('admin/userlevel/delete/'.$val->level_id, 'Delete', 'title="Delete" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="7">User Level Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>