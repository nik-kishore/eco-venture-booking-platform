<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form Success</title>
    </head>
	<body>
		<p>
			<?php
				echo "<p>Thank you <b>".$_POST["fullname"]."</b>!</p>";
				echo "<p>Your submission has been received successfully.We’ll get back to you shortly with more details.</p>";
			?>

		</p>

	</body>
</html>