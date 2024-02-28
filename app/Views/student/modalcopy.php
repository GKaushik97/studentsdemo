<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
  	  	<div class="modal-content">
  	  	  	<div class="modal-header">
  	  	  	  	<h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
  	  	  	  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	  	  	</div>
  	  	  	<div class="modal-body">
  	  	  		<form>
  	  	  		  	<div class="mb-3">
  	  	  		  	  	<label for="name" class="form-label">Name</label>
  	  	  		  	  	<input type="text" class="form-control" id="name">
  	  	  		  	</div>
  	  	  		  	<fieldset class="row mb-3">
  	  	  		  	    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
  	  	  		  	    <div class="col-sm-10">
  	  	  		  	      	<div class="form-check">
  	  	  		  	      	  	<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="M">
  	  	  		  	      	  	<label class="form-check-label" for="gridRadios1">
  	  	  		  	      	  	  Male
  	  	  		  	      	  	</label>
  	  	  		  	      	</div>
  	  	  		  	      	<div class="form-check">
  	  	  		  	      	  	<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="F">
  	  	  		  	      	  	<label class="form-check-label" for="gridRadios2">
  	  	  		  	      	  	  Female
  	  	  		  	      	  	</label>
  	  	  		  	      	</div>
  	  	  		  	    </div>
  	  	  		  	</fieldset>
  	  	  		  	<?php if(isset($hobbies)){ ?>
	  	  	  		  	<select class="form-select" name="course">
	  	  	  		  	  <option value="">All</option>
	  	  	  		  	  <?php foreach ($hobbies as $key => $value) { ?>
	  	  	  		  	  			<option><?= $value['name']; ?></option>
	  	  	  		  	  <? } ?>
	  	  	  		  	</select>
  	  	  		  	<?php } ?>

  	  	  		  	
  	  	  		  	<label>Hobbies</label>
  	  	  		  	<div class="mb-3">
  	  	  		  		<?php foreach($hobbies as $key => $hobby){ ?>
  	  	  		  	  		<input type="checkbox" class="form-check-input"><?= $hobby['name']; ?>
  	  	  		  		<?php } ?>
  	  	  		  	</div>
  	  	  		  	<button type="submit" class="btn btn-primary">Submit</button>
  	  	  		</form>
  	  	  	</div>
  	  	  	<div class="modal-footer">
  	  	  	  	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  	  	  	  	<button type="button" class="btn btn-primary">Save changes</button>
  	  	  	</div>
  	  	</div>
  	</div>
</div> -->