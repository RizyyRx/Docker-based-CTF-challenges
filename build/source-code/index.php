<?php
include "libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php load_template("_ctf_head"); ?>

<body style="display: flex; flex-direction: column; min-height: 100vh;">
  <?php load_template("_DarkLightMode"); ?>

  <main>
    <?php load_template("_ctf_header"); 
    load_template("_ctf_main");
    ?>

  </main>
  <?php load_template("_ctf_footer"); ?>
  <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>