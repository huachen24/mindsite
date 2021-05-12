<?php
    include 'header.php';
?>

<div class="navbar">
    <div class="link">
        <a href="index.php">Home</a>
    </div>
    <div class="link active">
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

<div class="searchbar">
    <form method="GET" action="search.php">
        <input type="text" placeholder="Search database" name="search" size="40">
        <input class="search-button" type="submit" value="Search">
    </form>
</div>

<div class="resource-container">
    <?php
        $sql = "SELECT * FROM resources";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='resource'>";
                if ($row['image'] == 1) {
                    echo "<div class='resource-img'><img id='profile' src='profiles/".$row['rid'].".png'></div>";
                } else {
                    echo "<div class='resource-img'><img id='profile' src='profiles/default.png'></div>";
                }
                echo "<div class='resource-details'>
                        <h3>".$row['title']."</h3>
                        <p>".$row['address']."</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pellentesque, eros vel facilisis vehicula, neque dui commodo ex, vel pulvinar mi enim in quam. Nam nisi est, molestie porta quam quis, scelerisque tristique ligula. Aliquam et leo porta, porttitor velit nec, mollis velit. Maecenas a hendrerit diam. Proin feugiat dolor in augue efficitur aliquam. In scelerisque orci et tristique finibus. Duis aliquam in tellus at ornare. In a tempus quam, sollicitudin sagittis eros. Ut in porta ligula, at viverra lorem.</p>
                        </div>";
                echo "</div>";
            }
        } else {
            echo "<h1>There are no results matching your search!</h1>";
        }
    ?>
</div>

</body>
</html>