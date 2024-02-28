<?php
/**
 * State Body Page
 */ 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	if(session()->getFlashdata('status')){
		?>
		<div>
			<strong>Hey!..</strong><?= session()->getFlashdata('status'); ?>
		</div>
	<?php }
	?>
	<table border="1">
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
			<?php foreach($countries as $key=> $value): ?>
				<tr>
					<td><?= $value['id']; ?></td>
					<td><?= $value['name']; ?></td>
					<td><?= $value['code']; ?></td>
					<td><?= $value['added_at']; ?></td>
					<td><a href="http://localhost/ci4/public/country/countryEdit?id=<?php echo $value['id']; ?>">Edit</a></td>
					<td><a href="http://localhost/ci4/public/country/add">ADD</a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
