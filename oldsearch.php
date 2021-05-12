<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Search</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <div class="link">
                    <a href="about.html">About</a>
                </div>
                <div class="link active">
                    <a href="index.html">Resources</a>
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

            <div class="search-page">
                <div class="filter">
                    <div class="dropdown">
                        <button class="dropbtn">Category</button>
                        <div class="dropdown-content">
                            <a href="search.html">Therapy Centers</a>
                            <a href="search.html">Online Resources</a>
                            <a href="search.html">Treatment Centers</a>
                        </div>
                    </div>
                    <div class="slidecontainer">
                        <div class="price">Max price range: <output id="demo"></output></div>
                        <input type="range" min="0" max="300" value="150" class="slider" id="myRange">
                        <div class="price-label">
                            <div>$0</div>
                            <div>$300</div>
                        </div>
                    </div>
                </div>
                <div class="main-search">
                    <img src="images/example-search.png">
                </div>
            </div>

        </div>
    </body>
    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
</html>