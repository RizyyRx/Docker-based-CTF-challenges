<div class="container">
    <div id="accordion" class="row justify-content-center">

        <!-- Challenge 1 -->
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center" id="headingOne">
                    <h5 class="mb-0 flex-grow-1 text-center">
                        <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Challenge 1 <span class="dropdown-arrow"></span>
                        </button>
                    </h5>
                    <button class="btn btn-info mt-3 ml-auto" data-toggle="modal" data-target="#hintModal1">Hint</button>
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

        <!-- Hint Modal 1 -->
        <div class="modal fade" id="hintModal1" tabindex="-1" role="dialog" aria-labelledby="hintModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hintModalLabel1">Hint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        The hint for Challenge 1 is: Skull is not important. It's actually about what's inside it.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Challenge 2 -->
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center" id="headingTwo">
                    <h5 class="mb-0 flex-grow-1 text-center">
                        <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Challenge 2 <span class="dropdown-arrow"></span>
                        </button>
                    </h5>
                    <button class="btn btn-info mt-3 ml-auto" data-toggle="modal" data-target="#hintModal2">Hint</button>
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

        <!-- Hint Modal 2 -->
        <div class="modal fade" id="hintModal2" tabindex="-1" role="dialog" aria-labelledby="hintModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hintModalLabel2">Hint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        The hint for Challenge 2 is: Look for ways to inject JavaScript through user input.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Challenge 3 -->
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center" id="headingThree">
                    <h5 class="mb-0 flex-grow-1 text-center">
                        <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Challenge 3 <span class="dropdown-arrow"></span>
                        </button>
                    </h5>
                    <button class="btn btn-info mt-3 ml-auto" data-toggle="modal" data-target="#hintModal3">Hint</button>
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

        <!-- Hint Modal 3 -->
        <div class="modal fade" id="hintModal3" tabindex="-1" role="dialog" aria-labelledby="hintModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hintModalLabel3">Hint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        The hint for Challenge 3 is: Test various user IDs and permissions by interacting with them.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Challenge 4 -->
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center" id="headingFour">
                    <h5 class="mb-0 flex-grow-1 text-center">
                        <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Challenge 4 <span class="dropdown-arrow"></span>
                        </button>
                    </h5>
                    <button class="btn btn-info mt-3 ml-auto" data-toggle="modal" data-target="#hintModal4">Hint</button>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                        <p>Why is it upload? Why not loadup??</p>
                        <p>And also do you know who is called as the headshot machine of CSGO?</p>
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

        <!-- Hint Modal 4 -->
        <div class="modal fade" id="hintModal4" tabindex="-1" role="dialog" aria-labelledby="hintModalLabel4" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hintModalLabel4">Hint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        The hint for Challenge 4 is: Find a way to upload a script that will get executed on the server.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Challenge 5 -->
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center" id="headingFive">
                    <h5 class="mb-0 flex-grow-1 text-center">
                        <button class="accordion-button btn btn-primary mt-3 center-accordion text-center" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Challenge 5 <span class="dropdown-arrow"></span>
                        </button>
                    </h5>
                    <button class="btn btn-info mt-3 ml-auto" data-toggle="modal" data-target="#hintModal5">Hint</button>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body">
                        <p>Jimmy Hopkins was a good boy. Once, he found a special item which was glowing magically.
                            when he touched it, he suddenly teleported into another world.
                            There, he saw man guarding a gate.
                            The guardian said "There are three magical words you have to say to open this door".
                            Jimmy asked what's behind the door?
                            The guardian replied "A fantastic treat that everyone loves".
                            Jimmy asked where can he find those three words.
                            The guardian replied "you can travel to multiple worlds using the special item. I will tell you the path.
                            If you traversed your way into the worlds and found those 3 words, you have to combine them which forms a word(seperated by _).
                            When you say those sentence with three words, the gates will open and I will let you in".
                            Jimmy was excited to find the words within the worlds.
                            Will you help him to find them??</p>

                        <p>THE TRAVELLING PATH INSTRUCTED BY THE GUARDIAN:</p>
                        <p>1.There are worlds above and below this world. You can imagine like them like a ladder.</p>
                        <p>2.First go up one world, you will find a place called "athens". Go inside it.</p>
                        <p>3.In athens, you will find a woman named "athena". you can get the first word from her.</p>
                        <p>4.Then, from athens, move up 3 worlds. You will find a place called "olympus". Go inside it.</p>
                        <p>5.You will find a man named "zeus". You can get the second word from him.</p>
                        <p>6.From olympus, move up 4 worlds. You will find a place called "sparta". Go inside it.</p>
                        <p>7.You will find a man named "kratos". You can get the third word from him.</p>
                        <form action="index.php" method="post">
                            <input type="hidden" name="challenge_name" value="directory_traversal">
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

        <!-- Hint Modal 5 -->
        <div class="modal fade" id="hintModal5" tabindex="-1" role="dialog" aria-labelledby="hintModalLabel5" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hintModalLabel5">Hint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        The hint for Challenge 5 is: Try to perform directory traversal through url.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>