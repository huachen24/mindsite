<?php

include "../../dbh.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM reviews WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if ($result == FALSE) {
        echo "<h1>An error occured!</h1>";
    } else {
        $queryResult = mysqli_num_rows($result);
        if ($queryResult == 1) {
            $row = mysqli_fetch_assoc($result);
            $rid = $row['rid'];
            $accessibility = $row['accessibility'];
            $approachability = $row['approachability'];
            $price = $row['price'];
            $service = $row['service'];

            $updaterating = "UPDATE resources SET `ratingcount` = `ratingcount` + 1, `accessibility` = `accessibility` + ?, `approachability` = `approachability` + ?, `pricerating` = `price` + ?, `service` = `service` + ? WHERE rid = ?";

            if ($stmt = mysqli_prepare($conn, $updaterating)) {
                mysqli_stmt_bind_param($stmt, "iiiii", $accessibility, $approachability, $price, $service, $rid);
        
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_query($conn, "DELETE FROM `reviews` WHERE id=$id");
                    header("Location: ../approve_ratings.php");
                    exit();
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

        } else {
            echo "<h1>An error occured!</h1>";
        }
    }

        
}

?>