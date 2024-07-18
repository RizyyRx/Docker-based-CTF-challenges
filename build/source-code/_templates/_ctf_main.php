<?php
if (isset($_POST['challenge_name'], $_POST['flag'])) {
  try {
    // Sanitize input
    $challenge_name = htmlspecialchars(trim($_POST['challenge_name']));
    $flag = htmlspecialchars(trim($_POST['flag']));

    // Verify the flag
    $result = Flag::verifyFlag($challenge_name, $flag);

    if ($result) {
      // Set completion status if flag is verified
      Database::setCompletionStatus($challenge_name); ?>
      <div class="d-flex justify-content-center">
        <div class="alert alert-success mt-3 text-center" role="alert">
          <h4 class="alert-heading">Flag is Correct!</h4>
          <p>Challenge completed successfully.</p>
        </div>
      </div>
    <?php
    } else { ?>
      <div class="d-flex justify-content-center">
        <div class="alert alert-danger mt-3 text-center" role="alert">
          <h4 class="alert-heading">Flag is Incorrect!</h4>
          <p>Try again. Don't lose hope.</p>
        </div>
      </div>
<?php
    }

    // // Redirect to avoid resubmission on page refresh
    // header('Location: ' . $_SERVER['PHP_SELF']);
    // exit;
  } catch (Exception $e) {
    // Handle exceptions
    error_log('Exception caught: ' . $e->getMessage());
    print("An error occurred. Please try again later.\n");
  }
} ?>
<div>
  <div class="container pt-4">
    <div class="text-center" style="color: white;">
      <h1 class="display-4">Welcome to CTF Arena</h1>
      <p class="mt-3" style="font-size: 1.25rem;">Try to exploit Web Application vulnerabilities and submit the flags</p>
    </div>
  </div>

  <div class="d-flex justify-content-center py-4">
    <a href="gamerz_arena_index.php" class="btn btn-primary">Click here to visit the vulnerable website</a>
  </div>

  <div class="col text-center pb-4">
    <button onclick="location.href='reset.php'" class="btn btn-danger">Reset Progress</button>
  </div>


  <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="border rounded p-4" style="width: 100%; max-width: 600px;">
      <div class="text-center">
        <div class="row mb-3">
          <div class="col">
            <h5 class="<?php echo Database::checkCompletionStatus('sql_injection') ? 'bg-success text-white p-2 rounded' : 'bg-danger text-white p-2 rounded'; ?>">
              Challenge 1: <?php echo Database::checkCompletionStatus('sql_injection') ? 'Completed' : 'Not Completed'; ?>
            </h5>
          </div>
        </div>
        <hr>
        <div class="row mb-3">
          <div class="col">
            <h5 class="<?php echo Database::checkCompletionStatus('xss') ? 'bg-success text-white p-2 rounded' : 'bg-danger text-white p-2 rounded'; ?>">
              Challenge 2: <?php echo Database::checkCompletionStatus('xss') ? 'Completed' : 'Not Completed'; ?>
            </h5>
          </div>
        </div>
        <hr>
        <div class="row mb-3">
          <div class="col">
            <h5 class="<?php echo Database::checkCompletionStatus('idor') ? 'bg-success text-white p-2 rounded' : 'bg-danger text-white p-2 rounded'; ?>">
              Challenge 3: <?php echo Database::checkCompletionStatus('idor') ? 'Completed' : 'Not Completed'; ?>
            </h5>
          </div>
        </div>
        <hr>
        <div class="row mb-3">
          <div class="col">
            <h5 class="<?php echo Database::checkCompletionStatus('insecure_file_upload') ? 'bg-success text-white p-2 rounded' : 'bg-danger text-white p-2 rounded'; ?>">
              Challenge 4: <?php echo Database::checkCompletionStatus('insecure_file_upload') ? 'Completed' : 'Not Completed'; ?>
            </h5>
          </div>
        </div>
        <hr>
        <div class="row mb-3">
          <div class="col">
            <h5 class="<?php echo Database::checkCompletionStatus('directory_traversal') ? 'bg-success text-white p-2 rounded' : 'bg-danger text-white p-2 rounded'; ?>">
              Challenge 5: <?php echo Database::checkCompletionStatus('directory_traversal') ? 'Completed' : 'Not Completed'; ?>
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="container pt-4">
    <div class="text-center" style="color: white;">
      <h1 class="display-4">Make sure to submit the flags</h1>
      <p class="mt-3" style="font-size: 1.25rem;">Read the challenge decriptions carefully.</p>
    </div>
  </div>