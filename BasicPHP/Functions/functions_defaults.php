<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<title>Functions: Default Argument Values</title>
	</head>
	<body>
		<?php
		//how to set default value
			function paint($room="office",$color="red") {
				return "The color of the {$room} is {$color}.<br />";
			}
		//paint() use default value
			echo paint();
			echo paint("bedroom", "blue");
			echo paint("bedroom", null);
      //color still use default value
			echo paint("bedroom");
			echo paint("blue");

		?>
	</body>
</html>
