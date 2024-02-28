<?php
/**
 * To add the student 
 */ 
$ex_hobbies = isset($imp_hobbies) ? explode(",", $imp_hobbies) : array();
?>
<div class="modal-dialog">
  	<div class="modal-content">
  	   	<form method="post" onsubmit="insertStudent()" id="add_student" enctype="multipart/form-data">
  	   		<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
  	  		<div class="modal-header">
  	  		  <h5 class="modal-title">Add Student</h5>
  	  		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	  		</div>
  	  		<div class="modal-body">
  	  		  	<div class="mb-3">
  	  		  	  	<label for="name" class="form-label">Name</label>
  	  		  	  	<input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>">
  	  				<span class="text-danger"><?php if(isset($errors['name'])){ echo $errors['name']; } ?></span>
  	  		  	</div>
  	  		  	<fieldset class="row mb-3">
  	  		  	    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
  	  		  	    <div class="col-sm-10">
  	  		  	      	<div class="form-check">
  	  		  	      	  	<input class="form-check-input" type="radio" name="gender" value="M"<?if(set_value('gender') == "M"){echo "checked";} ?>>
  	  		  	      	  	<label class="form-check-label">Male</label>
  	  		  	      	</div>
  	  		  	      	<div class="form-check">
  	  		  	      	  	<input class="form-check-input" type="radio" name="gender" value="F"<?if(set_value('gender') == "F"){echo "checked";} ?>>
  	  		  	      	  	<label class="form-check-label">Female</label>
  	  		  	      	</div>
  	  		  	    </div>
  	  				<span class="text-danger"><?php if(isset($errors['gender'])){ echo $errors['gender']; } ?></span>
  	  		  	</fieldset>
  	  		  	<label class="form-label">Courses</label>
  	  		  	<?php if(isset($courses)){ ?>
	  	  		  	<select class="form-select" name="course">
	  	  		  	  <option value="">All</option>
	  	  		  	  <?php foreach ($courses as $key => $value) { ?>
	  	  		  	  			<option value="<?= $value['id']; ?>"<?if($value['id'] == set_value('course')){ echo "selected";}?>><?= $value['name']; ?></option>
	  	  		  	  <? } ?>  
	  	  		  	</select>
  	  				<span class="text-danger"><?php if(isset($errors['course'])){ echo $errors['course']; } ?></span>
  	  		  	<?php } ?>
  	  		  	<br/>
  	  		  	<label class="form-label">Hobbies</label>
  	  		  		<?php foreach($hobbies1 as $key => $hobby){ ?>
  	  		  	<div class="col-12"> 
  	  		  		<div class="form-check">
  	  		  		  	<input type="checkbox" name="hobbies[]" class="form-check-input" value="<?= $hobby['id']; ?>"<?if(in_array($hobby['id'], $ex_hobbies)){ echo "checked";}?>>
  	  		  		  	<label class="form-check-label"><?= $hobby['name']; ?></label>
  	  		  		</div>
  	  		  	</div>
  	  		  		<?php } ?>
  	  			<span class="text-danger"><?php if(isset($errors['hobbies'])){ echo $errors['hobbies']; } ?></span>
  	  			<br/>
  	  			<label class="form-label">Document</label>
  	  			<div class="input-group mb-3">
  	  			  	<input type="file" class="form-control" name="document">
  	  			</div>
  	  			<span class="text-danger"><?php if(isset($errors['document'])){ echo $errors['document']; } ?></span>
  	  		</div>
  	  		<div class="modal-footer">
  	  		  	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  	  		  	<button type="button" onclick="insertStudent()" class="btn btn-primary">Add Student</button>
  	  		</div>
  	  	</form>
  	</div>
</div>
