<!DOCTYPE html>
<html>
	<head>
		<title>Update State</title>
	</head>
	<body>
		<form method="post" action="http://localhost/ci4/public/states/stateUpdate">
			<input type="text" name="name" value="<?php echo $stateupdate['name']; ?>">
			<input type="text" name="code" value="<?php echo $stateupdate['code']; ?>">
			<input type="hidden" name="id" value="<?= $stateupdate['id']; ?>">
			<input type="submit">
		</form>
	</body>
</html>