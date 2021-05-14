<?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='resource'>";
        if ($row['image'] == 1) {
            echo "<div class='resource-img'><img id='profile' src='profiles/".$row['rid'].".png'></div>";
        } else {
            echo "<div class='resource-img'><img id='profile' src='profiles/default.png'></div>";
        }
        echo "<div class='resource-details'>
                <h3 onclick='on(".$row['rid'].")'>".$row['title']."</h3>
                <p class='keywords'>".$row['keywords']."</p>
                <p>".$row['shortdesc']."</p>
                </div>";
        echo "</div>";
        echo "<div id='overlay-".$row['rid']."' onclick='off(".$row['rid'].")'>";
        echo "<div id='overlaytext'>";
            echo "<h3><a href='".$row['weblink']."'>".$row['title']."</a></h3>
            <p>".$row['price']."</p>
            <p>".$row['address']."</p>
            <p>".$row['longdesc']."</p>";
        echo "</div>";
        echo "</div>";
    }
?>