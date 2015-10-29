<!--create a database connection-->
<!--also test database connections-->
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<!--'header' do the first part of HTML-->
<?php include("../includes/layouts/header.php"); ?>

//find out the page's value

<?php
	if (isset($_GET["subject"])) {
		$selected_subject_id = $_GET["subject"];
		$selected_page_id = null;
	} elseif (isset($_GET["page"])) {
		$selected_subject_id = null;
		$selected_page_id = $_GET["page"];
	} else {
		$selected_subject_id = null;
		$selected_page_id = null;
	}
?>

<div id="main">
  <div id="navigation">
    <!--'navigation' function take care the navigation-->
    <?php echo navigation($selected_subject_id, $selected_page_id); ?>
  </div>
  <div id="page">
    <h2>Manage Content</h2>
    <?php echo $selected_subject_id; ?><br />
		<?php echo $selected_page_id; ?>
  </div>
</div>

<!--'footer' do the last part of HTML-->
<?php include("../includes/layouts/footer.php"); ?>
