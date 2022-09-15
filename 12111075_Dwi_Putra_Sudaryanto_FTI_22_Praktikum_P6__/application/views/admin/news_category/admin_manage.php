<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Parent</th>
			<th>Name</th>
			<th>Description</th>
			<th>News</th>
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
						<td><?php echo $val->parent != 0 ? $this->NewsCategoryModel->findByPk($val->parent)->cat_name : '-';?></td>
						<td><?php echo $val->cat_name;?></td>
						<td><?php echo $val->cat_desc;?></td>
						<td class="center"><?php echo $val->news;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->publish);?></td>
						<td class="button-column">
							<?php echo anchor('admin/newscategory/edit/'.$val->cat_id, 'Update', 'title="Update" class="update"');?>
							<?php echo anchor('admin/newscategory/delete/'.$val->cat_id, 'Delete', 'title="Delete" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="7">News Category Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>