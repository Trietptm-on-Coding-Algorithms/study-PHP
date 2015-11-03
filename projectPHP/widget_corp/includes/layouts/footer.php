    <div id="footer">Copyright 2015, Widget Corp by Yegun Kim</div>

	</body>
</html>
<?php
  // 5. Close database connection
  // make sure $connection exist or not
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
