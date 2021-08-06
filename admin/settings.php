<?php
include 'header.php';
include 'navbar.php';
?>

<div class='main'>
<div class='sidebar'>

<?php echo "<h2>".$_SESSION["user"]." settings</h2>";?>

<h3>Select an action</h3>

<div class='action_list'>
<a href='chg_pwd.php'>Change password</a>
<a href='approve_user.php'>Approve new admins</a>
</div>


</div>
</div>
</body>
</html>