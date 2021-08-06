<?php
include '../../dbh.php';

$name = $_GET['name'];

$sql = "UPDATE `users` SET `approval`=1 WHERE `username`=?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $name);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../approve_user.php?add=success");
        exit();
    }
    else {
        header("Location: ../approve_user.php?add=fail");
        exit();
    }
} else {
    header("Location: ../approve_user.php?add=fail");
    exit();
}

mysqli_stmt_close($stmt);

?>