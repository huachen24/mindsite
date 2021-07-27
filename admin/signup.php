<?php
    include 'header.php';
?>
<div class='main'>
<div class='center'>
<h1 class='title'>MindSite</h1>
<h2>Admin Signup</h2>
<form action='includes/signup.inc.php' method='POST'>
    <div class='field'>
    <label for='user'>Username: </label>
    <input type='text' id='user' name='user' placeholder='Enter username' required>
    </div>
    <div class='field'>
    <label for='pwd'>Password: </label>
    <input type='password' id='pwd' name='pwd' placeholder='Enter password' required>
    </div>
    <div class='field'>
    <label for='pwd2'>Confirm Password: </label>
    <input type='password' id='pwd2' name='pwd2' placeholder='Confirm password' required>
    </div>
    <div class='buttons'>
    <a href='login.php'>Back</a>
    <button type='submit' name='submit'>Sign Up</button>
    </div>
</form>

<?php
    if (isset($_GET["error"])) {
        if ($_GET['error'] == 'blank') {
            echo "Please complete all fields";
        } else if ($_GET["error"] == "pwd") {
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

</div>
</div>

</body>
</html>