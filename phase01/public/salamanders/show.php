<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? '1';
$pageTitle = 'Show Salamander';
include(SHARED_PATH . '/salamander-header.php');

?> 

<h2>Salamander Details</h2>

<p><a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
