<?php
    include 'header.php';
?>
<div class='main'>
<div class='center'>
<h1 class='title'>MindSite</h1>
<h2>Please log in to access administrative functions</h2>
<form action='includes/login.inc.php' method='POST'>
    <div class='field'>
    <label for='user'>Admin ID</label>
    <input type='text' id='user' name='user' placeholder='Enter username' required>
    </div>
    <div class='field'>
    <label for='pwd'>Password</label>
    <input type='password' id='pwd' name='pwd' placeholder='Enter password' required>
    </div>
    <div class='buttons'>
    <a href='signup.php'>Sign Up</a>
    <button type='submit' name='submit'>Login</button>
    </div>
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
</div>
</div>

</body>
</html>