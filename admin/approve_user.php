<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div id='approve_user' class='sidebar'>
<table>
    <tr>
        <th>Username</th>
        <th>Approve</th>
        <th>Reject</th>
    </tr>
<?php

    $sql = "SELECT username FROM users WHERE approval=0";
    $result = mysqli_query($conn, $sql);
    if ($result == FALSE) {
        echo "<tr><td colspan='3'>There are no new users to approve</td></tr>";
    } else {
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['username']."</td>
                <td><a href='includes/approve_user.inc.php?name=".$row['username']."'>o</a></td>
                <td><a href='includes/reject_user.inc.php?name=".$row['username']."'>o</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>There are no new users to approve</td></tr>";
        }
    }
?>
</table>
</div>
</div>
</body>
</html>