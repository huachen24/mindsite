<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>
<div class='main'>
<div class='sidebar' style='justify-content:start; margin-top:6em;'>
<h3>Manage quotes</h3>
<?php
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<p>Successfully added the quote :)</p>";
        } else {
            echo "<p>Failed to add the quote</p>";
        }
    }

    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'success') {
            echo "<p>Successfully deleted the quote :)</p>";
        } else {
            echo "<p>Failed to delete the quote</p>";
        }
    }
?>
<div id='quotes'>
    <div id='add_quote'>
    <form action='includes/submit_quote.inc.php' method='POST'>
        <textarea name='quote' rows='8'></textarea>
        <input id='submit_quote' type='submit' value='Add quote'></input>
    </form>
    </div>
<table>
<?php
    $sql = "SELECT id, quote FROM quotes";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['quote']."</td>
            <td><a href='includes/delete_quote.inc.php?id=".$row['id']."'>Delete</a></td></tr>";
        }
    } else {
        echo "No resources";
    }
?>
</table>
</div>

</div>
</div>
</body>
</html>