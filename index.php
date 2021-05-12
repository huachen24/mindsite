<?php
    include 'header.php';
?>

<div class="navbar">
    <div class="link active">
        <a href="index.php">Home</a>
    </div>
    <div class="link">
        <a href="resources.php">Resources</a>
    </div>
    <div class="link">
        <a href="about.html">About</a>
    </div>
    <div class="link">
        <a href="contribute.html">Contribute</a>
    </div>
    <div class="link">
        <a href="feedback.html">Feedback</a>
    </div>
    <div class="link">
        <a href="contact.html">Contact Us</a>
    </div>
</div>

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