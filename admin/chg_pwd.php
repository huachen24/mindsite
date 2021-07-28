<?php
    include 'header.php';
    include 'navbar.php'
?>

<div class='main'>
<div class='sidebar'>
<h3>Change Password</h3>
<form id='chg-form' action='includes/chg_pwd.inc.php' method='POST'>
    <div class='field'>
        <label for='old_pwd'>Current Password: </label>
        <input type='password' id='old_pwd' name='old_pwd' placeholder='Enter current password'>
    </div>
    <div class='field'>
        <label for='pwd'>New Password: </label>
        <input type='password' id='pwd' name='pwd' placeholder='Enter new password'>
    </div>
    <div class='field'>
        <label for='pwd2'>Confirm Password: </label>
        <input type='password' id='pwd2' name='pwd2' placeholder='Confirm new password'>
    </div>
    <div class='buttons'>
    <button><a href='index.php'>Back</a></button>
    <button type='submit' name='submit'>Change Password</button>
    </div>
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

</div>
</div>
</body>
</html>