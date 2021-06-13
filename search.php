<?php
    include 'header.php';
?>

<div class='resource-search'>
    <form method='POST' action='search.php'>
        <div class='resource-searchbar'>
            <input type='text' placeholder='Search database' name='search'>
            <input class='resource-searchbutton' type='submit' value='search'>
        </div>
        <?php include 'filters.php';?>
    </form>
</div>

<div class="resource-container">
    <?php
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = generateSQL($conn);
            $result = mysqli_query($conn, $sql);
            if ($result == FALSE) {
                echo "<h1>There are no results matching your search!</h1>";
            } else {
                $queryResult = mysqli_num_rows($result);

                if ($queryResult > 0) {
                    $all_resources = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $all_resources[] = $row;
                    }
                    echo "<h1 align-content='left'>Showing results for ".$search.":</h1>";
                    include 'listresources.php';
                } else {
                    echo "<h1>No resources found.<br>Try another query?</h1>";
                    echo "<img class='mascot' src='images/no_results.png'>";
                    echo "<h1>Or suggest a new resource</h1>";
                    echo "<a href='contribute.php'>CONTRIBUTE</a>";
                }
            }
        } else {
            echo "<h1>An error occured.</h1>";
            echo "<a href='resources.php'>Go back</a>";
        }

        function generateSQL(mysqli $conn) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM resources WHERE (keywords LIKE '%$search%' OR title LIKE '%$search%')";
            if (isset($_POST['price'])) {
                $price = $_POST['price'];
                if ($price != 500) {
                    $sql .= " AND price <= '%$price%'";
                }
            }
            if (isset($_POST['age'])) {
                $age = $_POST['age'];
                if ($age != 0) {
                    $sql .= " AND ($age BETWEEN age')";
                }
            }
            if (isset($_POST['category'])) {
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $sql .= " AND JSON_CONTAINS(category, '%$category%')";
            }
            if (isset($_POST['location'])) {
                $location = mysqli_real_escape_string($conn, $_POST['location']);
                $sql .= " AND JSON_CONTAINS(location, '%$location%')";
            }
            $sql .= " ORDER BY clicks DESC, title ASC";
            return $sql;
        }
    ?>
</div>

</div>
</div>
</body>

<script>

    function on(rid) {
        var resource = document.getElementById("overlay-"+rid);
        resource.style.display = "flex";
    }

    function off(rid) {
        document.getElementById("overlay-"+rid).style.display = "none";
    }

</script>

</html>