<?php
    include 'header.php';
    if (isset($_GET['resource'])) { 
        include 'resource.php';
    } else { ?>

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
<?php } ?>

</div>
</div>
</body>
</html>