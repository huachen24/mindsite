<?php
    $current_resources = array_slice($all_resources, $resource_offset, $perpage);
    foreach ($current_resources as $resource) {
        echo "<div class='resource'>";
        if ($resource['image'] == 'png' || $resource['image'] == 'jpg' || $resource['image'] == 'svg') {
            echo "<div class='resource-img'><img id='profile' src='profiles/".$resource['rid'].".".$resource['image']."'></div>";
        } else {
            echo "<div class='resource-img'><img id='profile' src='profiles/default.png'></div>";
        }
        echo "<div class='resource-details'>
            <form method='GET' action ='resources.php'>
            <input type='hidden' id='resource' name='resource' value='".$resource['rid']."'>
            <input type='submit' value='".$resource['title']."'>
            </form>

            <div class='keywords'>";
                $keywords = json_decode($resource['specialty']);
                for ($i = 0; $i < count($keywords); $i++) {
                    echo "<div class='keyword'>".$keywords[$i]."</div>";
                }
            echo "</div>
            <p>".$resource['shortdesc']."</p>";
        echo "</div>";
        echo "</div>";
    }
    echo "<div class='pagebar'>";
    if ($current_page > 1) {
        echo "<a href='".generate_url($current_page-1)."'>Prev</a>";
    }
    $total_pages = ceil(sizeof($all_resources)/$perpage);
    for ($i=1; $i<=$total_pages; $i++) {
        if ($i == $current_page) {
            if ($total_pages > 1) {
                echo "<a class='active_page'>".$current_page."</a>";
            }
        } else {
            echo "<a href='".generate_url($i)."'>".$i."</a>";
        }
    }
    if ($current_page < $total_pages) {
        echo "<a href='".generate_url($current_page+1)."'>Next</a>";
    }
    echo "</div>";

    function generate_url($i) {
        $params = $_GET;
        unset($params['page']);
        $params['page'] = $i;
        return basename($_SERVER['PHP_SELF']).'?'.http_build_query($params);
    }
?>