<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div id='approve_ratings' class='sidebar'>
<h3>Approve ratings</h3>
<table>
    <tr>
        <th>Resource</th>
        <th>Accessibility</th>
        <th>Approachability</th>
        <th>Price</th>
        <th>Service</th>
        <th>Approve</th>
    </tr>
<?php

    $sql = "SELECT * FROM reviews";
    $result = mysqli_query($conn, $sql);
    if ($result == FALSE) {
        echo "<tr><td colspan='6'>There are no ratings to approve</td></tr>";
    } else {
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['title']."</td>
                <td>".$row['accessibility']."</td>
                <td>".$row['approachability']."</td>
                <td>".$row['price']."</td>
                <td>".$row['service']."</td>
                <td><a href='includes/rating.inc.php?id=".$row['id']."'>o</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>There are no ratings to approve</td></tr>";
        }
    }
?>
</table>
</div>
</div>
</body>
</html>