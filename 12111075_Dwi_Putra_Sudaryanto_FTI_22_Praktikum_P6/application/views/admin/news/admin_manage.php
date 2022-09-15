<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Category</th>
			<th>Title</th>
			<th>Photo</th>
			<th>View</th>
			<th>Publish Date</th>
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
						<td><?php echo $this->NewsCategoryModel->findByPk($val->cat_id)->cat_name;?></td>
						<td><?php echo $val->news_title;?></td>
						<td><?php echo $val->news_photo;?></td>
						<td class="center"><?php echo $val->view;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->published_date);?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->publish);?></td>
						<td class="button-column">
							<?php echo anchor('admin/news/view/'.$val->news_id, 'View', 'title="View" class="view"');?>
							<?php echo anchor('admin/news/edit/'.$val->news_id, 'Update', 'title="Update" class="update"');?>
							<?php echo anchor('admin/news/delete/'.$val->news_id, 'Delete', 'title="Delete" class="delete"');?>
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