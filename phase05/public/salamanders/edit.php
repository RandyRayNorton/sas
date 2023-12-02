<?php require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php');
$pageTitle = "Edit Salamander";

// check to see if $_GET['id'] is set
if (!isset($_GET['id'])) {
  redirect_to(url_for('salamanders/index.php'));
}

$id = $_GET['id'];

if (is_post_request()) {

  // Handle form values sent by new.php

  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  $result = update_salamander($salamander);
  if($result == true) {
    redirect_to(url_for('salamanders/show.php?id=' . $id));
  } else {
    $errors = $result;
  //   var_dump($errors);
  }

} else {

  $salamander = find_salamander_by_id($id);

}

// load data when first displayed and when there are errors The data is not lost
$salamander_set = find_all_salamanders();
$salamander_count = mysqli_num_rows($salamander_set);
mysqli_free_result($salamander_set);

?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Salamander</h1>

    <?php echo display_errors($errors);?>

    <form action="<?= url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">

      <label for="name">
        <p>Name:<br> <input type="text" name="name" value="<?= h($salamander['name']); ?>"></p>
      </label>
      <label for="habitat">
        <p>Habitat: <br>
          <textarea rows="4" cols="50" name="habitat">
            <?= h($salamander['habitat']); ?>
        </textarea>
        </p>
      </label>
      <label for="description">
        <p>Description:<br>
          <textarea rows="4" cols="50" name="description">
            <?= h($salamander['description']); ?>
        </textarea>
        </p>
      </label>
      <label for="submit">
        <p><input type="submit" value="Update Salamander"></p>
      </label> 
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
