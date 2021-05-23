<?php
    include 'header.php';
?>

<div class='search'>
    <img src='images/MindSite_Main.png'>
    <form method='GET' action='search.php'>
        <div class='searchbar'>
            <input type='text' placeholder='Search database' name='search' size='40'>
            <input class='searchbutton' type='submit' value='search'>
        </div>
        <?php include 'filters.php';?>
    </form>
</div>

</div>
</body>
</html>