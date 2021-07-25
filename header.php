<?php
    include 'dbh.php';
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>MindSite</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
</head>
<body>
<div class="container">

<?php
    $perpage = 10;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $resource_offset = ($current_page-1)*$perpage;
    include 'navbar.php';
    if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false || $_SERVER['REQUEST_URI']=="/sync/") {
        echo "<div class='main-home'>";
    } else {
        echo "<div class='main'>";
    }
?>