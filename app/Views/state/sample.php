<table class="table table-bordered caption-top">
	<caption class="text-center"><strong><?= $page_heading; ?></strong></caption>
	<thead>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Code</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($states as $key=> $value): ?>
			<tr>
				<td><?= $value['id']; ?></td>
				<td><?= $value['name']; ?></td>
				<td><?= $value['code']; ?></td>
				<td><?= $value['added_at']; ?></td>
				<td>
					<a href="http://localhost/ci4/public/states/stateEdit?id=<?php echo $value['id']; ?>">Edit</a>
					<a href="http://localhost/ci4/public/states/stateAdd">ADD</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>