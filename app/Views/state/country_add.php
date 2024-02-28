<!DOCTYPE html>
<html>
	<body>
		<?php if($validation){ echo $validation->getErrors();}?>
		<form method="post" action="http://localhost/ci4/public/country/countryInsert">
			Name<input type="text" name="name" value="">
			Code<input type="text" name="code" value="">
			<input type="submit">
		</form>
	</body>
</html>