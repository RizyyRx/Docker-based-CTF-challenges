<main>
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
              <h5 class="<?php echo Database::checkCompletionStatus('challenge_5') ? 'bg-success text-white p-2 rounded' : 'bg-danger text-white p-2 rounded'; ?>">
                Challenge 5: <?php echo Database::checkCompletionStatus('challenge_5') ? 'Completed' : 'Not Completed'; ?>
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

    <div class="container">
      <div id="accordion" class="row justify-content-center">

        <!-- Challenge 1 -->
        <div class="col-lg-12 mb-3">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0 text-center">
                <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Challenge 1 <span class="dropdown-arrow"></span>
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <p>Do you know that sql and injection are born enemies?</p>
                <form action="index.php" method="post">
                  <input type="hidden" name="challenge_name" value="sql_injection">
                  <div class="form-group">
                    <label for="challenge1Flag">Enter Flag:</label>
                    <input type="text" class="form-control" id="challenge1Flag" name="flag" placeholder="CTF_ARENA{flag}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Challenge 2 -->
        <div class="col-lg-12 mb-3">
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0 text-center">
                <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Challenge 2 <span class="dropdown-arrow"></span>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <p>Today is X-mas, not XSS</p>
                <form action="index.php" method="post">
                  <input type="hidden" name="challenge_name" value="xss">
                  <div class="form-group">
                    <label for="challenge2Flag">Enter Flag:</label>
                    <input type="text" class="form-control" id="challenge2Flag" name="flag" placeholder="CTF_ARENA{flag}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Challenge 3 -->
        <div class="col-lg-12 mb-3">
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0 text-center">
                <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Challenge 3 <span class="dropdown-arrow"></span>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <p>How much authorization do you really have? Time to test it!!</p>
                <form action="index.php" method="post">
                  <input type="hidden" name="challenge_name" value="idor">
                  <div class="form-group">
                    <label for="challenge3Flag">Enter Flag:</label>
                    <input type="text" class="form-control" id="challenge3Flag" name="flag" placeholder="CTF_ARENA{flag}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Challenge 4 -->
        <div class="col-lg-12 mb-3">
          <div class="card">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0 text-center">
                <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Challenge 4 <span class="dropdown-arrow"></span>
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body">
                <p>why is it upload? why not loadup??</p>
                <p>And also do you know who is called as the headshot machine of csgo??</p>
                <form action="index.php" method="post">
                  <input type="hidden" name="challenge_name" value="insecure_file_upload">
                  <div class="form-group">
                    <label for="challenge4Flag">Enter Flag:</label>
                    <input type="text" class="form-control" id="challenge4Flag" name="flag" placeholder="CTF_ARENA{flag}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Challenge 5 -->
        <div class="col-lg-12 mb-3">
          <div class="card">
            <div class="card-header" id="headingFive">
              <h5 class="mb-0 text-center">
                <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Challenge 5 <span class="dropdown-arrow"></span>
                </button>
              </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>Description about Challenge 5</p>
                <form action="index.php" method="post">
                  <input type="hidden" name="challenge_name" value="anything">
                  <div class="form-group">
                    <label for="challenge5Flag">Enter Flag:</label>
                    <input type="text" class="form-control" id="challenge5Flag" name="flag" placeholder="CTF_ARENA{flag}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- End Accordion -->
    </div> <!-- End Container -->













</main>