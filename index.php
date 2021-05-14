<?php
    include 'header.php';
?>

<div class="content">
    <div class="search">
        <img src="images/MindSite_Main.png">
        <div class="searchbar">
            <form method="GET" action="search.php">
                <input type="text" placeholder="Search database" name="search" size="40">
                <input class="search-button" type="submit" value="Search">
            </form>
        </div>
    </div>
</div>

</div>
</body>
<!-- <script>
    const items = document.querySelectorAll('.item')
    items.forEach(i => {
        i.addEventListener('mouseover', () => {
            i.childNodes[1].classList.add('img-darken');
        })
        i.addEventListener('mouseout', () => {
            i.childNodes[1].classList.remove('img-darken');
        })
    });
</script> -->
</html>