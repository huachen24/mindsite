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
                <h3 onclick='on(".$resource['rid'].")'>".$resource['title']."</h3><div class='keywords'>";
        $keywords = json_decode($resource['keywords']);
        for ($i = 0; $i < count($keywords); $i++) {
            echo "<div class='keyword'>".$keywords[$i]."</div>";
        }
        echo "</div><p>".$resource['shortdesc']."</p>";
        echo "</div>";
        echo "</div>";
        echo "<div id='overlay-".$resource['rid']."' onclick='off(".$resource['rid'].")'>";
        echo "<div id='overlaytext'>";
            echo "<h3><a href='".$resource['weblink']."' id='click-".$resource['rid']."'>".$resource['title']."</a></h3>
            <p>".$resource['price']."</p>
            <p>".$resource['address']."</p>
            <p>".$resource['longdesc']."</p>";
        echo "</div>";
        echo "<script>$('#click-".$resource['rid']."').click(function(e){
            e.preventDefault();
            $.ajax({
                method: 'get',
                url: 'count_clicks.php',
                data: {
                    'resource_rid': ".$resource['rid'].",
                },
                success: function(data) {
                    window.location = '".$resource['weblink']."';
                }
            });
        });</script>";
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