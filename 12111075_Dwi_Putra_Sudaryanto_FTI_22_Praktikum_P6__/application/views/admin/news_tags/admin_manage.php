<div class="grid-view">
	<div class="summary clearfix"><span>Displaying 1-5 of <?php echo $total_rows;?> results.</span></div>
	<table class="items">
		<thead>
			<th>No</th>
			<th>Category</th>
			<th>News Title</th>
			<th>Tags</th>
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
						<td><?php 
						$cat_id = $this->NewsModel->findByPk($val->news_id)->cat_id;
						echo $this->NewsCategoryModel->findByPk($cat_id)->cat_name;?></td>
						<td><?php echo $this->NewsModel->findByPk($val->news_id)->news_title;?></td>
						<td><?php echo $this->TagsModel->findByPk($val->tag_id)->tag_name;?></td>
						<td><?php echo $this->Utility->dateFormat($val->creation_date);?></td>
					</tr>
				<?php }
			} else {?>
				<td colspan="5">News Category Not Found</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>