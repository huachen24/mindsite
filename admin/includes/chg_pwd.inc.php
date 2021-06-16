<?php
    include '../../dbh.php';
    session_start();
    
    $user = $_SESSION['user'];
    $old_pwd = $_POST['old_pwd'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['username'] == $user) {
                $saved_pwd = $row['pwd'];
                echo $saved_pwd;
            }
        }
    } else {
        $saved_pwd = "";
    }
    if ($pwd!=$pwd2) {
        header("Location: ../chg_pwd.php?error=pwd");
    } else if (password_verify($old_pwd, $saved_pwd)) {
        $sql = "UPDATE `users` SET `pwd`='$hashed_pwd' WHERE username = '$user'";
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {
            header("Location: ../chg_pwd.php?change=success");
        } else {
            header("Location: ../chg_pwd.php?change=error");
        }
    } else {
        header("Location: ../chg_pwd.php?error=invalid");
    }
?>