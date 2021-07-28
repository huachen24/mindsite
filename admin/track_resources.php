<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div class='sidebar' style='justify-content:start; margin-top:6em;'>
<h3>Track resources</h3>
<?php
    if (isset($_GET['reset'])) {
        if ($_GET['reset'] == "success") {
            echo "<p>Successfully reset clicks</p>";
        } else {
            echo "<p>Failed to reset clicks</p>";
        }
    }
    echo "<div id='track_resources'><table>
    <tr><th>Resource</th><th>Number of clicks</th>";
    $sql = "SELECT rid, title, clicks FROM resources";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th>".$row['title']."</th>
            <td>".$row['clicks']."</td></tr>";
        }
    } else {
        echo "No resources";
    }
    echo "</table></div>";
?>

    <form id='reset-form' action='includes/reset.inc.php' method=POST>
        <input id='reset' type="submit" value="Reset Clicks">
    </form>

</div>
</div>
</body>
</html>