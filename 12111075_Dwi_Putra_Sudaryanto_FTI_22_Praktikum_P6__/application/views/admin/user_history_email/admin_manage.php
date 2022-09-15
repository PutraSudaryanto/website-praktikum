<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Level</th>
			<th>Displayname</th>			
			<th>Email</th>
			<th>Update Date</th>
		</thead>
		<tbody>
			<?php if($content != null) {
				$i = $offset+0;
				foreach($content as $key => $val) {
					$i++;
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php 
						$level_id = $this->UsersModel->findByPk($val->user_id)->level_id;
						echo $this->UserLevelModel->findByPk($level_id)->level_name;?></td>
						<td><?php echo $this->UsersModel->findByPk($val->user_id)->displayname;?></td>
						<td><?php echo $val->email;?></td>
						<td><?php echo $this->Utility->dateFormat($val->update_date, true);?></td>
					</tr>
				<?php }
			} else {?>
				<td colspan="5">History Change Email Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>