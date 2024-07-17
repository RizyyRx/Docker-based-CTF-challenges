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
    <?php load_template("_ga_discussions"); ?>
  </main>

  <?php load_template("_ga_footer"); ?>
  <!-- Bootstrap JS (make sure this is included in your page) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var modalElement = document.getElementById("loginModal");
      var modal = new bootstrap.Modal(modalElement);
      modal.show();

      var closeButtons = modalElement.querySelectorAll("[data-bs-dismiss='modal']");
      closeButtons.forEach(function(button) {
        button.addEventListener("click", function() {
          modal.hide();
        });
      });
    });
  </script>

  <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php ob_end_flush(); //flushes output buffer, handles headers properly
?>