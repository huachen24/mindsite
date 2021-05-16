<?php
    include 'header.php';
?>

<div class="resultsearchbar">
    <form method="GET" action="search.php">
        <input type="text" placeholder="Search database" name="search" size="40">
        <input class="resultsearchbutton" type="submit" value="Search">
    </form>
</div>

<div class="resource-container">
    <?php
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = mysqli_real_escape_string($conn, $_GET['search']);
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
                    echo "<h1>There are no results matching your search!</h1>";
                }
            }
        } else {
            header("Location: ../SYNC/resources.php");
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