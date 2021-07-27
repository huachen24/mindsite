<?php

    $rid = $_GET['resource'];
    $result = mysqli_query($conn, "SELECT * FROM resources WHERE rid=$rid");
    if ($result == FALSE || mysqli_num_rows($result) == 0) {
        echo "<h1>This resource could not be found.</h1>";
        echo "<img class='mascot' src='images/no_results.png'>";
    } else {
        $resource = mysqli_fetch_assoc($result);

        echo "<div id='entry'>";
            echo "<div id='entry-info'>";
            if ($resource['image'] == 'png' || $resource['image'] == 'jpg' || $resource['image'] == 'svg') {
                echo "<div class='entry-img'><img style='background-color:white;' src='profiles/".$resource['rid'].".".$resource['image']."'></div>";
            } else {
                echo "<div class='entry-img'><img src='profiles/default.png'></div>";
            }
            echo "<div class='entry-details'>";
            echo "<h1><a href='".$resource['weblink']."' id='click-".$resource['rid']."'>".$resource['title']."</a></h1>
            <table>
            <tr><th>Age range: </th>
            <td>".$resource['agelower']."-".$resource['ageupper']."</td></tr>
            <tr><th>Price: </th>
            <td>".$resource['price']."</td></tr>
            <tr><th>Ratings: </th>
            <td><div class='ratings'>";
            if ($resource['ratingcount']==0) {
                echo "<p>There are no ratings yet</p>";
            } else {
                echo "<table>
                <tr><td>Accessibility</td><td>";
                $accessibility = (int)$resource['accessibility']/$resource['ratingcount'];
                for ($x = 0; $x < $accessibility; $x++) {
                    echo "★";
                }
                echo "</td></tr><tr><td>Approachability</td><td>";
                $approachability = (int)$resource['approachability']/$resource['ratingcount'];
                for ($x = 0; $x < $approachability; $x++) {
                    echo "★";
                }
                echo "</td></tr><tr><td>Price</td><td>";
                $price = (int)$resource['pricerating']/$resource['ratingcount'];
                for ($x = 0; $x < $price; $x++) {
                    echo "★";
                }
                echo "</td></tr><tr><td>Service</td><td>";
                $service = (int)$resource['service']/$resource['ratingcount'];
                for ($x = 0; $x < $service; $x++) {
                    echo "★";
                }
                echo "</td></tr><tr><td colspan='2'>Out of ".$resource['ratingcount']." total ratings</td>";
                echo "</tr></table>";
            }
            echo "</div></td></tr>
            <tr><th>Description: </th>
            <td>".$resource['longdesc']."</td></tr>
            <tr><th>Address: </th>
            <td>".$resource['address']."</td></tr>
            </table>";
            echo "</div>"; //close entry-details
            echo "</div>"; // close entry-info
            echo "<div class='review'>
                <h2>Leave a Review</h2>
                <form action='submit_rating.php' method='post'>
                <input type='hidden' id='rid' name='rid' value='".$resource['rid']."'>
                <input type='hidden' id='title' name='title' value='".$resource['title']."'>
                <div class='review-fields'>
                <div class='review-row'>
                <div class='review-label'>Accessibility</div>
                <div class='rate'>
                    <input type='radio' id='accessibility5' name='accessibility' value='5' />
                    <label for='accessibility5'></label>
                    <input type='radio' id='accessibility4' name='accessibility' value='4' />
                    <label for='accessibility4'></label>
                    <input type='radio' id='accessibility3' name='accessibility' value='3' />
                    <label for='accessibility3'></label>
                    <input type='radio' id='accessibility2' name='accessibility' value='2' />
                    <label for='accessibility2'></label>
                    <input type='radio' id='accessibility1' name='accessibility' value='1' />
                    <label for='accessibility1'></label>
                </div>
                </div>
            
                <div class='review-row'>
                <div class='review-label'>Approachability</div>
                <div class='rate'>
                    <input type='radio' id='approachability5' name='approachability' value='5' />
                    <label for='approachability5'></label>
                    <input type='radio' id='approachability4' name='approachability' value='4' />
                    <label for='approachability4'></label>
                    <input type='radio' id='approachability3' name='approachability' value='3' />
                    <label for='approachability3'></label>
                    <input type='radio' id='approachability2' name='approachability' value='2' />
                    <label for='approachability2'></label>
                    <input type='radio' id='approachability1' name='approachability' value='1' />
                    <label for='approachability1'></label>
                </div>
                </div>
            
                <div class='review-row'>
                <div class='review-label'>Price</div>
                <div class='rate'>
                    <input type='radio' id='price5' name='price' value='5' />
                    <label for='price5'></label>
                    <input type='radio' id='price4' name='price' value='4' />
                    <label for='price4'></label>
                    <input type='radio' id='price3' name='price' value='3' />
                    <label for='price3'></label>
                    <input type='radio' id='price2' name='price' value='2' />
                    <label for='price2'></label>
                    <input type='radio' id='price1' name='price' value='1' />
                    <label for='price1'></label>
                </div>
                </div>

                <div class='review-row'>
                <div class='review-label'>Service</div>
                <div class='rate'>
                    <input type='radio' id='service5' name='service' value='5' />
                    <label for='service5'></label>
                    <input type='radio' id='service4' name='service' value='4' />
                    <label for='service4'></label>
                    <input type='radio' id='service3' name='service' value='3' />
                    <label for='service3'></label>
                    <input type='radio' id='service2' name='service' value='2' />
                    <label for='service2'></label>
                    <input type='radio' id='service1' name='service' value='1' />
                    <label for='service1'></label>
                </div>
                </div>

            <input type='submit' name='submit' value='Submit'>
            </div>
            </div>
            </form>";
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
?>