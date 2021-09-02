<?php
    include '../../dbh.php';

    if (empty($_FILES['img']['name'])) {
        $image = "0";
    } else {
        $target_dir = "../../profiles/";
        $imageFileType = strtolower(pathinfo(basename($_FILES["img"]["name"]),PATHINFO_EXTENSION));
        echo $imageFileType;
        $image = $imageFileType;

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg" ) {
            header("Location: ../add_resource.php?error=imagetype");
            exit();
        }
        
        if ($_FILES["img"]["size"] > 500000) {
            header("Location: ../add_resource.php?error=imagesize");
            exit();
        }
    }


    $title = $_POST['title'];
    $shortdesc = $_POST['shortdesc'];
    $longdesc = $_POST['longdesc'];
    $price = $_POST['price'];
    $pricedesc = $_POST['pricedesc'];
    $address = $_POST['address'];

    if (isset($_POST['location'])) {
        $locationarray = $_POST['location'];
        $location = json_encode($locationarray);
    } else {
        $location = array();
    }
    
    $weblink = $_POST['weblink'];
    
    if (isset($_POST['agelower'])) {
        $agelower = $_POST['agelower'];
    } else {
        $agelower = 0;
    }
    
    if (isset($_POST['ageupper'])) {
        $ageupper = $_POST['ageupper'];
    } else {
        $ageupper = 100;
    }

    if (isset($_POST['type'])) {
        $typearray = $_POST['type'];
        $type = json_encode($typearray);
    } else {
        $type = array();
    }

    if (isset($_POST['specialty'])) {
        $specialtyarray = $_POST['specialty'];
        $specialty = json_encode($specialtyarray);
    } else {
        $specialty = array();
    }

    if (isset($_POST['modality'])) {
        $modalityarray = $_POST['modality'];
        $modality = json_encode($modalityarray);
    } else {
        $modality = array();
    }

    $sql = "INSERT INTO resources (`title`, `shortdesc`, `longdesc`, `price`, `pricedesc`, `address`, `location`, `weblink`, `type`, `specialty`, `modality`, `agelower`, `ageupper`, `image`) VALUES (?, ?, ?, ?, ?, ?, CAST(? AS JSON), ?, CAST(? AS JSON), CAST(? AS JSON), CAST(? AS JSON), ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssisssssssiis", $title, $shortdesc, $longdesc, $price, $pricedesc, $address, $location, $weblink, $type, $specialty, $modality, $agelower, $ageupper, $image);

        if (mysqli_stmt_execute($stmt)) {
            echo "SUCCESS";
        }
        else {
            header("Location: ../add_resource.php?error=execute");
            exit();
        }
    } else {
        header("Location: ../add_resource.php?error=prepare");
        exit();
    }

    mysqli_stmt_close($stmt);

    $getrid = "SELECT `rid` FROM `resources` WHERE `title` = '$title'";
    $result = mysqli_query($conn, $getrid);
    if ($row = mysqli_fetch_assoc($result)) {
        $rid = $row['rid'];    
    } else {
        header("Location: ../add_resource.php?error=execute");
        exit();
    }

    $target_file = $target_dir . $rid . "." . $imageFileType;

    if (file_exists($target_file)) {
        header("Location: ../add_resource.php?error=exists");
        exit();
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        header("Location: ../add_resource.php?add=success");
        exit();
    } else {
        header("Location: ../add_resource.php?add=noimage");
        exit();
    }

?>