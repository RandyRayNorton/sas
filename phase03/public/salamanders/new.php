<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

$pageTitle = "Create Salamander"; ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Salamander</h1>

    <form action="<?= url_for('/salamanders/create.php'); ?>" method="post">
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
