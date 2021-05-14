<?php
    include 'header.php';
?>

<div class="resultsearchbar">
    <form method="GET" action="search.php">
        <input type="text" placeholder="Search database" name="search" size="40">
        <input class="resultsearchbutton" type="submit" value="Search">
    </form>
</div>


<div class='resource-container'>
    <?php
        $sql = "SELECT * FROM resources";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            include 'listresources.php';
        } else {
            echo "<h1>There are no results matching your search!</h1>";
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