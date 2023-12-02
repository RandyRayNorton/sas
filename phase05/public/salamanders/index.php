<?php require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php');
$page_title = 'Salamanders';

// gets the salamander records and puts them into $salamander_set
$salamander_set = find_all_salamanders();
 ?>

<div id="content">
  <div class="salamanders listing">
    <h1>Salamanders</h1>

<!-- Create a new record -->
    <div class="actions">
      <a class="action" href="<?php echo url_for('salamanders/new.php'); ?>">Create New Salamander</a>
    </div>

<!-- display form header  -->
    <table class="list">
      <tr>
        <th>ID</th> 
        <th>Name</th>
        <th>Habitat</th>
        <th>Description</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

<!-- loop to display each record in the form layout -->
      <?php while ($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
        <tr>
          <td><?php echo h($salamander['id']); ?></td>
          <td><?php echo h($salamander['name']); ?></td>
          <td><?php echo h($salamander['habitat']); ?></td>
          <td><?php echo h($salamander['description']); ?></td>

          <td><a class="action" href="<?php echo url_for('/salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>

          <td><a class="action" href="<?php echo url_for('/salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>

          <td><a class="action" href="<?php echo url_for('/salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td>
          
        </tr>
      <?php } ?>
    </table>

    </php mysqli_free_result($page_set); ?>
    <?php mysqli_free_result($salamander_set); ?>
  Thanks to <a href="https://herpsofnc.org">Amphibian and Reptiles of North Carolina</a>
  </div>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
