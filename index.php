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
<div>
    <?php
        $rand = rand(1,8);
        $result = mysqli_query($conn, "SELECT * FROM quotes WHERE id='{$rand}'");
        $row = mysqli_fetch_assoc($result);
        echo "<p class='quote'>".$row['quote']."</p>";
    ?>
</div>

</div>
</div>
</body>
</html>