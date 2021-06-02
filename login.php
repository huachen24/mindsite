<?php
    session_start();
?>

<form action='includes/login.inc.php' method='POST'>
    <input type='text' name='user' placeholder='Enter username'>
    <input type='password' name='pwd' placeholder='Enter password'>
    <button type='submit' name='submit'>Login</button>
</form>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "pwd") {
            echo "invalid password";
        } else if ($_GET["error"] == "user") {
            echo "invalid username";
        } else {
            echo "error";
        }
    }
?>