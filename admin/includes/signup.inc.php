<?php
    include '../../dbh.php';
    
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['username']==$user) {
                header("Location: ../signup.php?error=user");
            }
        }
    } else if (!password_verify($pwd2, $hashed_pwd)) {
        header("Location: ../signup.php?error=pwd");
    } else {
        $sql = "INSERT INTO `users` (`username`, `pwd`) VALUES ('$user', '$hashed_pwd')";
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {
            header("Location: ../signup.php?signup=success");
        } else {
            header("Location: ../signup.php?signup=error");
        }
    }
?>