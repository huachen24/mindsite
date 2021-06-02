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

<div class='resource-container'>
    <div id="data"></div>
    <?php
        $sql = "SELECT * FROM resources ORDER BY clicks DESC, title ASC";
        $result = mysqli_query($conn, $sql);
        if ($result == FALSE) {
            echo "<h1>There are no resources at the moment!</h1>";
        } else {
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                $all_resources = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $all_resources[] = $row;
                }
                include 'listresources.php';
            } else {
                echo "<h1>There are no resources at the moment!</h1>";
            }
        }
    ?>
</div>

</div>

<script>

    function on(rid) {
        var resource = document.getElementById("overlay-"+rid);
        resource.style.display = "flex";
    }

    function off(rid) {
        document.getElementById("overlay-"+rid).style.display = "none";
    }

</script>
</body>
</html>