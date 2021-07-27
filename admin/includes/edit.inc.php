<?php
    include '../../dbh.php';

    if (empty($_FILES['img']['name'])) {
        $updateimage = FALSE;
        $image = "0";
    } else {
        $updateimage = TRUE;
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

    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $updatetitle = TRUE;
    } else {
        $updatetitle = FALSE;
    }

    if (!empty($_POST['shortdesc'])) {
        $shortdesc = $_POST['title'];
        $updateshortdesc = TRUE;
    } else {
        $updateshortdesc = FALSE;
    }

    if (!empty($_POST['longdesc'])) {
        $longdesc = $_POST['longdesc'];
        $updatelongdesc = TRUE;
    } else {
        $updatelongdesc = FALSE;
    }

    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
        $updateprice = TRUE;
    } else {
        $updateprice = FALSE;
    }

    if (!empty($_POST['address'])) {
        $address = $_POST['address'];
        $updateaddress = TRUE;
    } else {
        $updateaddress = FALSE;
    }

    if (!empty($_POST['weblink'])) {
        $weblink = $_POST['weblink'];
        $updateweblink = TRUE;
    } else {
        $updateweblink = FALSE;
    }

    if (!empty($_POST['agelower'])) {
        $agelower = $_POST['agelower'];
        $updateagelower = TRUE;
    } else {
        $updateagelower = FALSE;
    }

    if (!empty($_POST['ageupper'])) {
        $ageupper = $_POST['ageupper'];
        $updateageupper = TRUE;
    } else {
        $updateageupper = FALSE;
    }

    if (!empty($_POST['type'])) {
        $typearray = $_POST['type'];
        $type = "['".$typearray[0]."'";
        for ($i=1; $i<count($typearray); $i++) {
            $type .= ", '".$typearray[$i]."'";
        }
        $type .= "]";
        $updatetype = TRUE;
    } else {
        $updatetype = FALSE;
    }
    
    if (!empty($_POST['specialty'])) {
        $specialtyarray = $_POST['specialty'];
        $specialty = "[\"".$specialtyarray[0]."\"";
        for ($i=1; $i<count($specialtyarray); $i++) {
            $specialty .= ", \"".$specialtyarray[$i]."\"";
        }
        $specialty .= "]";
        $updatespecialty = TRUE;
    } else {
        $updatespecialty = FALSE;
    }

    if (!empty($_POST['modality'])) {
        $modalityarray = $_POST['modality'];
        $modality = "['".$modalityarray[0]."'";
        for ($i=1; $i<count($modalityarray); $i++) {
            $modality .= ", '".$modalityarray[$i]."'";
        }
        $modality .= "]";
        $updatemodality = TRUE;
    } else {
        $updatemodality = FALSE;
    }

    echo $updatetitle;
    echo $updateshortdesc;
    echo $updatelongdesc;
    echo $updateprice;
    echo $updateaddress;
    echo $updateweblink;
    echo $updatetype;
    echo $updatespecialty;
    echo $updatemodality;
    echo $updateagelower;
    echo $updateageupper;
    echo $updateimage;

    // $sql = "UPDATE `resources` SET ".
    // ($updatetitle ? "`title`=?, " : "").
    // ($updateshortdesc ? "`shortdesc`=?, " : "").
    // ($updatelongdesc ? "`longdesc`=?, " : "").
    // ($updateprice ? "`price`=?, " : "").
    // ($updateaddress ? "`address`=?, " : "").
    // ($updateweblink ? "`weblink`=?, " : "").
    // ($updatetype ? "`type`=?, " : "").
    // ($updatespecialty ? "`specialty`=?, " : "").
    // ($updatemodality ? "`modality`=?, " : "").
    // ($updateagelower ? "`agelower`=?, " : "");
    // ($updateageupper ? "`ageupper`=?, " : "").
    // ($updateimage ? "`image`=?, " : "").
    // "`rid`=? WHERE `rid` = ?";

    // if ($stmt = mysqli_prepare($conn, $sql)) {
    //     mysqli_stmt_bind_param($stmt, "sssssssssiis", $title, $shortdesc, $longdesc, $price, $address, $weblink, $type, $specialty, $modality, $agelower, $ageupper, $image);

    //     if (mysqli_stmt_execute($stmt)) {
    //         echo "SUCCESS";
    //     }
    //     else {
    //         echo mysqli_error($conn);
    //         header("Location: ../add_resource.php?error=execute");
    //         exit();
    //     }
    // } else {
    //     header("Location: ../add_resource.php?error=prepare");
    //     exit();
    // }

    // mysqli_stmt_close($stmt);

    $getrid = "SELECT `rid` FROM `resources` WHERE `title` = '$title'";
    $result = mysqli_query($conn, $getrid);
    if ($row = mysqli_fetch_assoc($result)) {
        $rid = $row['rid'];    
    } else {
        // header("Location: ../add_resource.php?error=execute");
        // exit();
    }

    $target_file = $target_dir . $rid . "." . $imageFileType;

    if (file_exists($target_file)) {
        // header("Location: ../add_resource.php?error=exists");
        // exit();
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // header("Location: ../add_resource.php?add=success");
        // exit();
    } else {
        // header("Location: ../add_resource.php?add=noimage");
        // exit();
    }

?>