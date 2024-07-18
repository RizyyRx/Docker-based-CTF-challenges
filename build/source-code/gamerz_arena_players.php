<?php
ob_start(); //start output buffering, to handle headers properly
include "libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php load_template("_ga_head"); ?>
<?php $flag = "51 31 52 47 58 30 46 53 52 55 35 42 65 33 67 31 4E 56 38 78 4E 56 39 75 4D 44 64 66 59 32 68 79 4D 54 55 33 62 54 51 31 66 51 3D 3D"; ?>
<script>
  function alertFlag() {

    var flag = document.getElementById('flag').value;
    alert(flag);
  }
</script>

<body style="display: flex; flex-direction: column; min-height: 100vh;" class="bg-grey">
  <input type="hidden" id="flag" value="<?php echo $flag; ?>">
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