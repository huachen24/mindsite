<?php
    include 'header.php';
?>

<form action='includes/chg_pwd.inc.php' method='POST'>
    <input type='password' name='old_pwd' placeholder='Enter current password'><br>
    <input type='password' name='pwd' placeholder='Enter new password'><br>
    <input type='password' name='pwd2' placeholder='Confirm new password'><br>
    <button type='submit' name='submit'>Change Password</button>
</form>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "pwd") {
            echo "Passwords do not match<br>";
        } else if ($_GET["error"] == "invalid") {
            echo "Current password is invalid<br>";
        } else if ($_GET["error"] == "error") {
            echo "Error encountered<br>";
        } else {
            echo "Error encountered<br>";
        }
    }
    if (isset($_GET["change"])) {
        if ($_GET["change"] == "success") {
            echo "Password change successful<br>";
        } else if ($_GET["change"] == "error") {
            echo "Error changing password<br>";
        } else {
            echo "Error encountered<br>";
        }
    }
?>
<button><a href='index.php'>Back</a></button>

</body>
</html>