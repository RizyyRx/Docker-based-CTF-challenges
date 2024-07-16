<?php
ob_start(); //start output buffering, to handle headers properly
include "libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php load_template("_ga_head"); ?>

<body style="display: flex; flex-direction: column; min-height: 100vh;" class="bg-grey">
  <?php load_template("_DarkLightMode");

  load_template("_ga_header"); ?>
  <main>
    <?php load_template("_ga_players"); ?>
  </main>

  <?php load_template("_ga_footer"); ?>

  <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php ob_end_flush(); //flushes output buffer, handles headers properly
?>