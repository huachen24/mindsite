<?php
include '../../dbh.php';

$id = $_GET['id'];

$sql = "DELETE FROM quotes WHERE id=?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../manage_quotes.php?delete=success");
        exit();
    }
    else {
        header("Location: ../manage_quotes.php?delete=fail");
        exit();
    }
} else {
    header("Location: ../manage_quotes.php?delete=fail");
    exit();
}

mysqli_stmt_close($stmt);

?>