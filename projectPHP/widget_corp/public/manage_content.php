<?php require_once("../includes/session.php"); ?>
<!--create a database connection-->
<!--also test database connections-->
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<!--'header' do the first part of HTML-->
<?php include("../includes/layouts/header.php"); ?>

<!--find out the page's value-->
<?php find_selected_page(); ?>

<div id="main">
  <div id="navigation">
    <!--'navigation' function take care the navigation-->
    <?php echo navigation($current_subject, $current_page); ?>
		<a href="new_subject.php">+ Add a subject </a>
  </div>
  <div id="page">

    <?php echo message(); ?>

		<?php if($current_subject) {?>
			<h2>Manage Subject</h2>

			Menu name : <?php echo $current_subject["menu_name"]; ?><br/>

		<?php } elseif ($current_page) { ?>
			<h2>Manage page</h2>

			Page name : <?php echo $current_page["menu_name"]; ?><br/>

		<?php } else { ?>

			Please select a subject or a page.

		<?php }?>

  </div>
</div>

<!--'footer' do the last part of HTML-->
<?php include("../includes/layouts/footer.php"); ?>
