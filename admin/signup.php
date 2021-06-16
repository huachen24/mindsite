<?php
    include 'header.php';
?>

<form action='includes/signup.inc.php' method='POST'>
    <input type='text' name='user' placeholder='Enter username'><br>
    <input type='password' name='pwd' placeholder='Enter password'><br>
    <input type='password' name='pwd2' placeholder='Confirm password'><br>
    <button type='submit' name='submit'>Sign Up</button>
</form>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "pwd") {
            echo "Passwords do not match<br>";
        } else if ($_GET["error"] == "user") {
            echo "Username already in use<br>";
        } else {
            echo "Error encountered<br>";
        }
    }
    if (isset($_GET["signup"])) {
        if ($_GET["signup"] == "success") {
            echo "Signup successful!<br>";
        } else if ($_GET["signup"] == "error") {
            echo "Error signing up<br>";
        } else {
            echo "Error encountered<br>";
        }
    }
?>
<button><a href='login.php'>Log In</a></button>

</body>
</html>