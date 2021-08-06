<?php
include '../../dbh.php';

$rid = $_GET['rid'];

$sql = "DELETE FROM resources WHERE rid=?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $rid);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../edit_resource.php?delete=success");
        exit();
    }
    else {
        header("Location: ../edit_resource.php?delete=fail");
        exit();
    }
} else {
    header("Location: ../edit_resource.php?delete=fail");
    exit();
}

mysqli_stmt_close($stmt);

?>