<?= $this->extend('state/header'); ?>
<?= $this->section('title'); ?>
	<?= "Add State"; ?>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<form method="post" action="http://localhost/ci4/public/states/stateInsert">
	<label>Name</label>
	<input type="text" name="name" value="<?= set_value('name'); ?>">
	<span class="text-danger"><?php if(isset($errors['name'])){ echo $errors['name'];} ?></span>
	<label>Code</label>
	<input type="text" name="code" value="<?= set_value('code'); ?>">
	<span class="text-danger"><?php if(isset($errors['code'])){ echo $errors['code'];} ?></span>
	<button type="submit" class="btn btn-primary">Add</button>
	<a type="button" class="btn btn-primary" href="http://localhost/ci4/public/states" title="Home Page">Back</a>
</form>
<?= $this->endSection(); ?>
