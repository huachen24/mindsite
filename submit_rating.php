<?php

    include "header.php";

    if (isset($_POST['submit'])) {
        $result = mysqli_query($conn, "INSERT INTO reviews VALUES (".(int)$_POST['rid'].", ".(int)$_POST['accessibility'].", ".(int)$_POST['approachability'].", ".(int)$_POST['price'].", ".(int)$_POST['service'].")");
        if ($result == FALSE) {
            echo "<h1>failed</h1>";
        } else {
            echo "<div class='form-success'>
            <div>Thank you for your review!</div>
            <img class='mascot' src='images/form_success.png'>
            <div>Have a nice day!</div>
            <div>-MindSite</div>
            </div>";
        }
    }

?>