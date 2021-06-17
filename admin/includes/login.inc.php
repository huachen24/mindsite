<?php
    include '../../dbh.php';
    
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pwd, $row['pwd'])) {
                session_start();
                $_SESSION["user"] = $user;
                header("Location: ../index.php");
            } else {
                header("Location: ../login.php?error=pwd");
            }
        }
    } else {
        header("Location: ../login.php?error=user");
    }
?>