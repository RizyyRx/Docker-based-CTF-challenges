<?php
include "libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php load_template("_head"); ?>

<body style="display: flex; flex-direction: column; min-height: 100vh;">
  <?php load_template("_DarkLightMode"); ?>

  <main class="bg-black">
    <?php load_template("_header"); 
    load_template("_mainCTF");
    ?>

  </main>
  <?php load_template("_footer"); ?>
  <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>