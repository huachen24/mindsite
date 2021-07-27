<?php

    include "header.php";

    if (isset($_POST['submit'])) {
        $rid = $_POST['rid'];
        $title = $_POST['title'];
        $accessibility = $_POST['accessibility'];
        $approachability = $_POST['approachability'];
        $price = $_POST['price'];
        $service = $_POST['service'];

        $sql = "INSERT INTO reviews (`rid`, `title`, `accessibility`, `approachability`, `price`, `service`) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "isiiii", $rid, $title, $accessibility, $approachability, $price, $service);
    
            if (mysqli_stmt_execute($stmt)) {
                echo "<div class='form-success'>
                <div>Thank you for your review!</div>
                <img class='mascot' src='images/form_success.png'>
                <div>Have a nice day!</div>
                <div>-MindSite</div>
                </div>";
            }
            else {
                echo "FAILED TO EXECUTE";
                echo mysqli_error($conn);
            }
        } else {
            echo "FAILED TO PREPARE";
            echo mysqli_error($conn);
        }
    
        mysqli_stmt_close($stmt);

    }

?>