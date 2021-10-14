<?php require_once('../private/initialize.php'); ?>

<?php
  // Get requested ID
  $id = $_GET['id'] ?? false;

  if(!$id) {
    redirect_to('bird.php');
  }
  // Find bird using ID
  $bird = Bird::find_by_id($id);
?>

<?php $page_title = 'Detail: ' . $bird->common_name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <a href="bird.php">Back to Inventory</a>

  <div id="page">
    <div class="detail">

      <dl style="clear: both;height: 1em;margin-bottom: 1em;">
        <dt style="float: left;width: 100px;font-weight: bold;">Name</dt>
        <dd style="float: left;"><?php echo h($bird->common_name); ?></dd>
      </dl>

      <dl style="clear: both;height: 1em;margin-bottom: 1em;">
        <dt style="float: left;width: 100px;font-weight: bold;">Habitat</dt>
        <dd style="float: left;"><?php echo h($bird->habitat); ?></dd>
      </dl>

      <dl style="clear: both;height: 1em;margin-bottom: 1em;">
        <dt style="float: left;width: 100px;font-weight: bold;">Food</dt>
        <dd style="float: left;"><?php echo h($bird->food); ?></dd>
      </dl>

      <dl style="clear: both;height: 1em;margin-bottom: 1em;">
        <dt style="float: left;width: 100px;font-weight: bold;">Conservation Level</dt>
        <dd style="float: left;"><?php echo h($bird->conservation()); ?></dd>
      </dl><br>

      <dl style="clear: both;height: 1em;margin-bottom: 1em;">
        <dt style="float: left;width: 100px;font-weight: bold;">Backyard Tips</dt>
        <dd style="float: left;"><?php echo h($bird->backyard_tips); ?></dd>
      </dl>

    </div>

  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
