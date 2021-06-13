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

</div>
</div>
</body>
</html>