<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Level</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
			<th>Created Date</th>
			<th>Enable</th>
			<th>Verified</th>
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
						<td><?php echo $this->UserLevelModel->findByPk($val->level_id)->level_name;?></td>
						<td><?php echo $val->displayname;?></td>
						<td><?php echo $val->username;?></td>
						<td><?php echo $val->email;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date);?></td>						
						<td class="center"><?php echo $this->Utility->getPublish($val->enabled);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->verified);?></td>
						<td class="button-column">
							<?php echo anchor('admin/users/view/'.$val->user_id, 'View', 'title="View" class="view"');?>
							<?php echo anchor('admin/users/edit/'.$val->user_id, 'Update', 'title="Update" class="update"');?>
							<?php echo anchor('admin/users/delete/'.$val->user_id, 'Delete', 'title="Delete" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="9">User Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>