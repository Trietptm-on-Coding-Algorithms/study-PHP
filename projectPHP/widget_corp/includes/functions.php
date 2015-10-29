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
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection, $query);
		//'confirm_query' function comes from 'functions.php'
		confirm_query($subject_set);
		return $subject_set;
	}

	function find_pages_for_subject($subject_id){
		global $connection;
		// 2. Perform database query
		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE visible = 1 ";
		$query .= "AND subject_id = {$subject_id} ";
		$query .= "ORDER BY position ASC ";
		$page_set = mysqli_query($connection, $query);
		//'confirm_query' function comes from 'functions.php'
		confirm_query($page_set);
		return $page_set;
	}

	// navigation takes 2 arguments
	// - the currently selected subject ID (if any)
	// - the currently selected page ID (if any)
	function navigation($subject_id, $page_id) {
		//building subject list
		$output = "<ul class=\"subjects\">";
		$subject_set = find_all_subjects();
		while($subject = mysqli_fetch_assoc($subject_set)) {
			$output .= "<li";
			if ($subject["id"] == $subject_id) {
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
				if ($page["id"] == $page_id) {
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
?>
