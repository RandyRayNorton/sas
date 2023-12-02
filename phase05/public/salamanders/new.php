<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

if(is_post_request()) {

  $salamander = [];
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  $result = insert_salamander($salamander);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('salamanders/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }
  
} else { 
  // display the blank form
  $salamander = [];
  $salamander["name"] = '';
  $salamander["habitat"] = '';
  $salamander["description"] = '';
}
  
$salamander_set = find_all_salamanders();
$salamander_count = mysqli_num_rows($salamander_set) + 1;
mysqli_free_result($salamander_set);

$pageTitle = "Create Salamander"; ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Salamander</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?= url_for('/salamanders/new.php'); ?>" method="post">
      <label for="name">
        <p>Name:<br> <input type="text" name="name" value=""></p>
      </label>
      <label for="habitat">
        <p>Habitat: <br>
          <textarea rows="4" cols="50" name="habitat" value=""></textarea>
        </p>
      </label>
      <label for="description">
        <p>Description:<br>
          <textarea rows="4" cols="50" name="description" value=""></textarea>
        </p>
      </label>
      <div id="operations">
        <input type="submit" value="Create Salamander">
      </div>
    </form>

  </div>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
