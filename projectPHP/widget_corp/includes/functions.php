<?php
/*
<Refactoring>
1. simplicity
2. clearity
3. maintainability
*/
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function find_all_subjects(){
		global $connection;

		// 2. Perform database query
		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		//$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection, $query);
		//'confirm_query' function comes from 'functions.php'
		confirm_query($subject_set);
		return $subject_set;
	}

	function find_pages_for_subject($subject_id){
		global $connection;

		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

		// 2. Perform database query
		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE visible = 1 ";
		$query .= "AND subject_id = {$safe_subject_id} ";
		$query .= "ORDER BY position ASC ";
		$page_set = mysqli_query($connection, $query);
		//'confirm_query' function comes from 'functions.php'
		confirm_query($page_set);
		return $page_set;
	}

	// navigation takes 2 arguments
	// - the current subject array or null
	// - the current page array or null
	function navigation($subject_array, $page_array) {
		//building subject list
		$output = "<ul class=\"subjects\">";
		$subject_set = find_all_subjects();
		while($subject = mysqli_fetch_assoc($subject_set)) {
			$output .= "<li";
			if ($subject_array && $subject["id"] == $subject_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"manage_content.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= $subject["menu_name"];
			$output .= "</a>";

			//buliding page list
			$page_set = find_pages_for_subject($subject["id"]);
			$output .= "<ul class=\"pages\">";
			while($page = mysqli_fetch_assoc($page_set)) {
				$output .= "<li";
				if ($page_array && $page["id"] == $page_array["id"]) {
					$output .= " class=\"selected\"";
				}
				$output .= ">";
				$output .= "<a href=\"manage_content.php?page=";
				$output .= urlencode($page["id"]);
				$output .= "\">";
				$output .= $page["menu_name"];
				$output .= "</a></li>";
			}
			//free the result
			mysqli_free_result($page_set);
			$output .= "</ul></li>";
		}
		mysqli_free_result($subject_set);
		$output .= "</ul>";

		//return constructed string for HTML
		return $output;
	}

	function find_subject_by_id($subject_id){
		global $connection;

		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id = {$safe_subject_id} ";
		$query .= "LIMIT 1 ";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);

		if($subject = mysqli_fetch_assoc($subject_set)){
			return $subject;
		} else {
			return null;
		}
	}
	function find_page_by_id($page_id){
		global $connection;

		$safe_page_id = mysqli_real_escape_string($connection, $page_id);

		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id = {$safe_page_id} ";
		$query .= "LIMIT 1 ";
		$page_set = mysqli_query($connection, $query);
		confirm_query($page_set);
		if($page = mysqli_fetch_assoc($page_set)){
			return $page;
		} else {
			return null;
		}
	}

	function find_selected_page(){
		//define the default value is important!
		global $current_subject;
		global $current_page;

		if (isset($_GET["subject"])) {
			$current_subject = find_subject_by_id( $_GET["subject"]);
			$current_page = null;
		} elseif (isset($_GET["page"])) {
			$current_page = find_page_by_id($_GET["page"]);
			$current_subject = null;
		} else {
			$current_subject = null;
			$current_page = null;
		}
	}

	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}

	function mysql_prep($string){
		global $connection;
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}

	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>{$error}</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
?>
