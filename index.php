<?php
    include 'header.php';
?>

<img src='images/MindSite_Main.png'>
<div class='search'>
    <form method='POST' action='search.php'>
        <div class='searchbar'>
            <input type='text' placeholder='Search database' name='search'>
            <input class='searchbutton' type='submit' value='search'>
        </div>
        <?php include 'filters.php';?>
    </form>
</div>
<div class='quote'>
    <?php
        $rand = rand(1,20);
        $result = mysqli_query($conn, "SELECT * FROM quotes WHERE id='{$rand}'");
        if ($result!=false && mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_assoc($result);
            echo "<p>".$row['quote']."</p>";
        }
    ?>
</div>

</div>
</div>
</body>
</html>