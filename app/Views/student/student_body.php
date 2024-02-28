<?php
/**
 * Student Body Page
 */ 
?>
<!-- Button trigger modal -->
<div class="float-end d-flex align-items-center">
	<button type="button" class="btn btn-primary text-end" onclick="addStudent()">
	  Add Student
	</button>
</div>
<br/>
<br/>

<?php
if(session()->getFlashdata('status1')){
	?>
	<div id="add_body">
		<strong>Student!&nbsp;</strong><?= session()->getFlashdata('status1'); ?>
	</div>
<?php }
?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Course</th>
			<th>Hobbies</th>
			<th>Status</th>
			<th>Added At</th>
			<th>Actions</th>
		</tr>
	</thead>
	<?php 	
	if(isset($students)){
		foreach ($students as $key => $value) { ?>
			<tbody>
				<tr>
					<td><?= $value['id']; ?></td>
					<td><?= $value['name']; ?></td>
					<td><? if($value['gender'] == "M"){ echo "Male";}else{ echo "Female";} ?></td>
					<td><?= isset($courses[$value['course']]['name']) ? $courses[$value['course']]['name'] : '--' ; ?></td>
					<td><?php
						$hobbies2 = explode(",", $value['hobbies']);
						foreach ($hobbies2 as $key => $hobby) {
							echo isset($hobbies1[$hobby]['name']) ? $hobbies1[$hobby]['name']."," : '--';
						} ?>	
					</td>
					<td><? if($value['status'] == 1){echo "Active";}else{echo "Inactive";}?></td>
					<td><?= date('d-m-Y',strtotime($value['created_at'])); ?></td>
					<td>
						<button type="button" class="btn btn-primary" onclick="editStudent(<?= $value['id']; ?>)">Edit</button>
					</td>
				</tr>
			</tbody>
	<? }
	}else{ ?>
		<tr>
			<td colspan="7" class="bg bg-warning">No Records Found</td>
		</tr>
	<? } ?>
</table>

