<?php
include '../../dbh.php';

$quote = $_POST['quote'];

$sql = "INSERT INTO quotes (quote) VALUES (?)";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $quote);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../manage_quotes.php?add=success");
        exit();
    }
    else {
        header("Location: ../manage_quotes.php?add=fail");
        exit();
    }
} else {
    header("Location: ../manage_quotes.php?add=fail");
    exit();
}

mysqli_stmt_close($stmt);

?>