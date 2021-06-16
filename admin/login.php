<?php
    include 'header.php';
?>

<h2>Please log in to access administrative functions</h2>
<form action='includes/login.inc.php' method='POST'>
    <input type='text' name='user' placeholder='Enter username'><br>
    <input type='password' name='pwd' placeholder='Enter password'><br>
    <button type='submit' name='submit'>Login</button>
</form>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "pwd") {
            echo "invalid password<br>";
        } else if ($_GET["error"] == "user") {
            echo "invalid username<br>";
        } else {
            echo "error<br>";
        }
    }
?>
<button><a href='signup.php'>Sign Up</a></button>

</body>
</html>