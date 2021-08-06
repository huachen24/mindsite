<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>
<div class='main'>
<div class='sidebar' style='justify-content:start; margin-top:6em;'>
<h3>Edit resources</h3>
<?php
if (isset($_GET['delete']) && $_GET['delete']=='success') {
    echo "<p>Successfully deleted the resource.</p>";
}

?>
<input type="text" placeholder="Search..." id="search" onkeyup="searchFilter()"><br>
<div id='titles'>
<?php
    $sql = "SELECT rid, title FROM resources";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href='edit.php?rid=".$row['rid']."'>".$row['title']."</a>";
        }
    } else {
        echo "No resources";
    }
?>
</div>

</div>
</div>
</body>
<script>
    function searchFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        div = document.getElementById("titles");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
</html>