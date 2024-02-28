<div>
	<h2>This is my First Application.</h2>
</div>
<?php 
foreach($states as $state):
	echo $state['name']."<br>";
endforeach
?>
<table border="1">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Code</th>
			<th>Added</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($cars as $key=> $car): ?>
			<tr>
				<td><?= $car['id']; ?></td>	
				<td><?= $car['name']; ?></td>	
				<td><?= $car['code']; ?></td>	
				<td><?= date('d-m-Y',strtotime($car['added_at'])); ?></td>	
			</tr>
		<?php endforeach ?>
	</tbody>
</table>