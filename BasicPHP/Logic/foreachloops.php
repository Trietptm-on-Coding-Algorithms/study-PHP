<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Loops: foreach</title>
	</head>
	<body>

		<?php
		  $ages = array(4,8,15,16,23,42);
      //loop as much as array's variable nums
		  foreach($ages as $age) {
		    echo "Age: {$age}<br />";
		  }
		?>
		<br />
		<?php // foreach using assoc. array
			$person = array(
									"first_name" => "Kevin",
									"last_name"  => "Skoglund",
									"address"    => "123 Main Street",
									"city"       => "Beverly Hills",
									"state"      => "CA",
									"zip_code"   => "90210"
								);
      //foreach ($array as $key => $value){statement;}
		  foreach($person as $attribute => $data) {
				$attr_nice = ucwords(str_replace("_", " ", $attribute));
		    echo "{$attr_nice}: {$data}<br />";
		  }
		?>
		<br />
		<?php
		  $prices = array("Brand New Computer" => 2000,
		                  "1 month of Lynda.com" => 25,
		                  "Learning PHP" => null);

		  foreach($prices as $item => $price) {
		    echo "{$item}: ";
		    if (is_int($price)) {
		      echo "$" . $price;
		    } else {
		      echo "priceless";
		    }
		    echo "<br />";
		  }

		?>
	</body>
</html>
