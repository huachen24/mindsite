<?php
    include 'header.php';
?>

<form method='GET' action='search.php'>
    <div class='resultsearchbar'>
        <input type='text' placeholder='Search database' name='search' size='40'>
        <input class='resultsearchbutton' type='submit' value='search'>
    </div>
    <?php include 'filters.php';?>
</form>

<div class='resource-container'>
    <?php
        $sql = "SELECT * FROM resources";
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
        document.getElementById("overlay-"+rid).style.display = "flex";
    }

    function off(rid) {
        document.getElementById("overlay-"+rid).style.display = "none";
    }
    
</script>
</body>
</html>