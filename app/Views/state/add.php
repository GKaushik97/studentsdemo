<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php if(isset($errors)){ print_r($errors);} ?>
	<form method="post" action="http://localhost/ci4/public/country/countryInsert" enctype="multipart/form-data">
		Name<input type="text" name="name" value="<?= set_value('name'); ?>">
		<span><?php if(isset($errors['name'])){echo $errors['name']; }?></span>
			Code<input type="text" name="code" value="">
			Code<input type="file" name="image" value="">
			<input type="submit">
	</form>
</body>
</html>