    <div id="footer">Copyright 20xx, Widget Corp</div>

	</body>
</html>
<?php
  // 5. Close database connection
  // make sure $connection exist or not
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
