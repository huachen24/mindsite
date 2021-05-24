<?php
    include 'header.php';
?>

<form method="POST" action="search.php">
    <div class="resultsearchbar">
        <input type="text" placeholder="Search database" name="search" size="40">
        <input class="resultsearchbutton" type="submit" value="Search">
    </div>
        <?php include 'filters.php'?>
</form>

<div class="resource-container">
    <?php
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM resources WHERE keywords LIKE '%$search%' OR title LIKE '%$search%'";
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
                    echo "<h1>Suggest a new resource</h1>";
                    echo "<a href='contribute.php'>CONTRIBUTE</a>";
                }
            }
        } else {
            header("Location: ../sync/resources.php");
        }
    ?>
</div>

</div>
</body>

<script>
    function on(rid) {
        document.getElementById("overlay-"+rid).style.display = "flex";
    }

    function off(rid) {
        document.getElementById("overlay-"+rid).style.display = "none";
    }
</script>

</html>