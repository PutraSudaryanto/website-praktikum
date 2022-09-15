<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Created Date</th>
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
						<td><?php echo $val->displayname;?></td>
						<td><?php echo $val->email;?></td>
						<td><?php echo $val->message;?></td>
						<td><?php echo $this->Utility->dateFormat($val->creation_date);?></td>
						<td class="button-column">
							<?php echo anchor('admin/contact/delete/'.$val->contact_id, 'Delete', 'title="Delete" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="6">Contact Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>