<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MindSite Admin</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
<h2>Please log in to access administrative functions</h2>
<form action='login.inc.php' method='POST'>
    <input type='text' name='user' placeholder='Enter username'><br>
    <input type='password' name='pwd' placeholder='Enter password'><br>
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

</body>
</html>