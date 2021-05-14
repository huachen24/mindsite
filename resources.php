<?php
    include 'header.php';
?>

<div class="searchbar">
    <form method="GET" action="search.php">
        <input type="text" placeholder="Search database" name="search" size="40">
        <input class="search-button" type="submit" value="Search">
    </form>
</div>


<div class='resource-container'>
    <?php
        $sql = "SELECT * FROM resources";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='resource'>";
                if ($row['image'] == 1) {
                    echo "<div class='resource-img'><img id='profile' src='profiles/".$row['rid'].".png'></div>";
                } else {
                    echo "<div class='resource-img'><img id='profile' src='profiles/default.png'></div>";
                }
                echo "<div class='resource-details'>
                        <h3 onclick='on(".$row['rid'].")'>".$row['title']."</h3>
                        <p>".$row['address']."</p>
                        <p>".$row['description']."</p>
                        </div>";
                echo "</div>";
                echo "<div id='overlay-".$row['rid']."' onclick='off(".$row['rid'].")'>";
                echo "<div id='overlaytext'>";
                    echo "<h3><a href='".$row['weblink']."'>".$row['title']."</a></h3>
                    <p>".$row['address']."</p>
                    <p>".$row['description']."</p>";
                echo "</div>";
                echo "</div>";
            }
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