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
</head>
<body>
<div class="container">

<?php
    $perpage = 10;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $resource_offset = ($current_page-1)*$perpage;
    include 'navbar.php';
?>