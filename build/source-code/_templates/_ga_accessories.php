<div class="d-flex justify-content-center py-4">
    <form class="col-12 col-lg-auto mb-2 mb-lg-0 d-flex justify-content-center" method="POST" action="gamerz_arena_accessories.php" role="search">
        <input type="search" name="query" class="form-control" placeholder="Search..." aria-label="Search">
        <button type="submit" class="btn btn-primary ms-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
        </button>
    </form>
</div>

<?php
if (isset($_POST['query'])) { ?>
    <div class="container mt-3">
        <h3>Search Results:</h3>
        <div id="results">
            <?php
            $conn = Database::getConnection();

            //query based on user input which is set on $_POST['query']
            $query_name = $_POST['query'];


            if (empty($query_name) || trim($query_name) === '' || $query_name === "' '") {
                echo "<p>Please enter a search term.</p>";
            } else {
                $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$query_name%'";

                $result = $conn->query($sql);

                //list all the matching results
                if ($result->num_rows > 0) {
                    echo "<ul class='list-group' >";
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item mb-5 bg-dark text-white'>";
                        echo "<div class='text-center' style='font-size: 1.5rem;'>" . htmlspecialchars($row["name"]) . "</div><hr>";
                        if (!empty($row["image_url"])) {
                            echo "<div class='text-center mt-3'><img src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["name"]) . "' style='max-width: 300px;'></div>";
                        }
                        echo "<hr>";
                        echo "<div>Price: " . htmlspecialchars($row["price"]) . "</div><hr>";
                        echo "<div>Description: " . htmlspecialchars($row["description"]) . "</div><hr>";
                        echo "<div>Specifications: " . htmlspecialchars($row["specifications"]) . "</div>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No results found</p>";
                }
            }

            $conn->close();

            ?>
        </div>
    </div>
<?php
} else { ?>
    <div class="container py-3" bis_skin_checked="1">
        <div class="p-3 text-center bg-body-tertiary" bis_skin_checked="1">
            <div class="container py-3" bis_skin_checked="1">
                <h1 class="text-body-emphasis">Gaming Accessories Info</h1>
                <p class="col-lg-8 mx-auto lead">
                    With great Accessories, comes great victories
                </p>
                <p2 class="col-lg-8 mx-auto lead">
                    Search regarding below mentioned products
                </p2>
            </div>
        </div>

        <div class="container overflow-hidden text-center mt-4">
            <div class="row gy-4">
                <div class="col-6">
                    <div class="p-3 h4">Mouse</div>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="p-3 h4">Keyboard</div>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="p-3 h4">Headphones</div>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="p-3 h4">Mousepads</div>
                    <hr>
                </div>
            </div>
        </div>
    <?php
}
    ?>