<?php
    include '../../dbh.php';

    if (empty($_FILES['img']['name'])) {
        $updateimage = FALSE;
    } else {
        $updateimage = TRUE;
        $target_dir = "../../profiles/";
        $imageFileType = strtolower(pathinfo(basename($_FILES["img"]["name"]),PATHINFO_EXTENSION));
        echo $imageFileType;
        $image = $imageFileType;

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg" ) {
            header("Location: ../edit.php?error=imagetype");
            exit();
        }
        
        if ($_FILES["img"]["size"] > 500000) {
            header("Location: ../edit.php?error=imagesize");
            exit();
        }
    }

    $rid = $_POST['rid'];

    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $sql = generateUpdateQuery("title");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $title, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successtitle = TRUE;
            }
            else {
                $successtitle = FALSE;
            }
        } else {
            $successtitle = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['shortdesc'])) {
        $shortdesc = $_POST['shortdesc'];
        $sql = generateUpdateQuery("shortdesc");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $shortdesc, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successshortdesc = TRUE;
            }
            else {
                $successshortdesc = FALSE;
            }
        } else {
            $successshortdesc = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['longdesc'])) {
        $longdesc = $_POST['longdesc'];
        $sql = generateUpdateQuery("longdesc");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $longdesc, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successlongdesc = TRUE;
            }
            else {
                $successlongdesc = FALSE;
            }
        } else {
            $successlongdesc = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
        $sql = generateUpdateQuery("price");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ii", $price, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successprice = TRUE;
            }
            else {
                $successprice = FALSE;
            }
        } else {
            $successprice = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['pricedesc'])) {
        $pricedesc = $_POST['pricedesc'];
        $sql = generateUpdateQuery("pricedesc");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $pricedesc, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successpricedesc = TRUE;
            }
            else {
                $successpricedesc = FALSE;
            }
        } else {
            $successpricedesc = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    $locationarray = $_POST['location'];
    $location = json_encode($locationarray);
    $sql = generateJSONUpdateQuery("location");
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $location, $rid);

        if (mysqli_stmt_execute($stmt)) {
            $successlocation = TRUE;
        }
        else {
            $successlocation = FALSE;
        }
    } else {
        $successlocation = FALSE;
    }
    mysqli_stmt_close($stmt);

    if (!empty($_POST['address'])) {
        $address = $_POST['address'];
        $sql = generateUpdateQuery("address");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $address, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successaddress = TRUE;
            }
            else {
                $successaddress = FALSE;
            }
        } else {
            $successaddress = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['weblink'])) {
        $weblink = $_POST['weblink'];
        $sql = generateUpdateQuery("weblink");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $weblink, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successweblink = TRUE;
            }
            else {
                $successweblink = FALSE;
            }
        } else {
            $successweblink = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['agelower'])) {
        $agelower = $_POST['agelower'];
        $sql = generateUpdateQuery("agelower");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $agelower, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successagelower = TRUE;
            }
            else {
                $successagelower = FALSE;
            }
        } else {
            $successagelower = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($_POST['ageupper'])) {
        $ageupper = $_POST['ageupper'];
        $sql = generateUpdateQuery("ageupper");
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $ageupper, $rid);

            if (mysqli_stmt_execute($stmt)) {
                $successageupper = TRUE;
            }
            else {
                $successageupper = FALSE;
            }
        } else {
            $successageupper = FALSE;
        }
        mysqli_stmt_close($stmt);
    }

    $typearray = $_POST['type'];
    $type = json_encode($typearray);
    $sql = generateJSONUpdateQuery("type");
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $type, $rid);

        if (mysqli_stmt_execute($stmt)) {
            $successtype = TRUE;
        }
        else {
            $successtype = FALSE;
        }
    } else {
        $successtype = FALSE;
    }
    mysqli_stmt_close($stmt);


    $specialtyarray = $_POST['specialty'];
    $specialty = json_encode($specialtyarray);
    $sql = generateJSONUpdateQuery("specialty");
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $specialty, $rid);

        if (mysqli_stmt_execute($stmt)) {
            $successspecialty = TRUE;
        }
        else {
            $successspecialty = FALSE;
        }
    } else {
        $successspecialty = FALSE;
    }
    mysqli_stmt_close($stmt);


    $modalityarray = $_POST['modality'];
    $modality = json_encode($modalityarray);
    $sql = generateJSONUpdateQuery("modality");
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $modality, $rid);

        if (mysqli_stmt_execute($stmt)) {
            $successmodality = TRUE;
        }
        else {
            $successmodality = FALSE;
        }
    } else {
        $successmodality = FALSE;
    }
    mysqli_stmt_close($stmt);

    if ($updateimage) {
        $target_file = $target_dir . $rid . "." . $imageFileType;

        if (file_exists($target_file)) {
            if (!unlink($target_file)) { 
                $successimage = FALSE;
            } 
            else { 
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    $sql = generateUpdateQuery("image");
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "si", $image, $rid);

                        if (mysqli_stmt_execute($stmt)) {
                            $successimage = TRUE;
                        }
                        else {
                            $successimage = FALSE;
                        }
                    } else {
                        $successimage = FALSE;
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    $successimage = FALSE;
                }
            }
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $sql = generateUpdateQuery("image");
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "si", $image, $rid);

                    if (mysqli_stmt_execute($stmt)) {
                        $successimage = TRUE;
                    }
                    else {
                        $successimage = FALSE;
                    }
                } else {
                    $successimage = FALSE;
                }
                mysqli_stmt_close($stmt);
            } else {
                $successimage = FALSE;
            }
        }
    }
?>
<form name='edit_return' action='../edit.php' method='POST'>
    <input type='hidden' name='success' value='success'>
    <input type='hidden' name='rid' value='<?php echo $rid?>'>
    <input type='hidden' name='title' value='<?php echo $successtitle?>'>
    <input type='hidden' name='shortdesc' value='<?php echo $successshortdesc?>'>
    <input type='hidden' name='longdesc' value='<?php echo $successlongdesc?>'>
    <input type='hidden' name='price' value='<?php echo $successprice?>'>
    <input type='hidden' name='pricedesc' value='<?php echo $successpricedesc?>'>
    <input type='hidden' name='address' value='<?php echo $successaddress?>'>
    <input type='hidden' name='location' value='<?php echo $successlocation?>'>
    <input type='hidden' name='weblink' value='<?php echo $successweblink?>'>
    <input type='hidden' name='agelower' value='<?php echo $successagelower?>'>
    <input type='hidden' name='ageupper' value='<?php echo $successageupper?>'>
    <input type='hidden' name='type' value='<?php echo $successtype?>'>
    <input type='hidden' name='specialty' value='<?php echo $successspecialty?>'>
    <input type='hidden' name='modality' value='<?php echo $successmodality?>'>
    <input type='hidden' name='image' value='<?php echo $successimage?>'>
</form>

<script type='text/javascript'>
    document.edit_return.submit();
</script>


<?php

    function generateUpdateQuery($col) {
        return "UPDATE resources SET `".$col."`=? WHERE `rid`=?";
    }

    function generateJSONUpdateQuery($col) {
        return "UPDATE resources SET `".$col."`= CAST(? AS JSON) WHERE `rid`=?";
    }
?>