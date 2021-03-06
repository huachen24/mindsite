<div id='filters'>
    <div class='price-filter'>
        <label>Max cost: <br><input type='number' min='0' max='500' id='price' name='price' value='500'></label><br>
        <input type='range' min='0' max='500' class='slider' id='priceRange' value='500'>
        <div class='price-label'>
            <div>$0</div>
            <div>$500</div>
        </div>
    </div>
    <div class='age-filter'>
        <label>Your age: <br>
            <input type='number' id='age' name='age' min='0' max='100' value='0'>
        </label>
    </div>
    <div class='category-filter'>
        <label>Categories: <br>
            <div class='categories'>
                <label>
                    <input type='checkbox' name='category' value='counselling'>Counselling
                </label>
                <label>
                    <input type='checkbox' name='category' value='self-help'>Self-help
                </label>
                <label>
                    <input type='checkbox' name='category' value='treatment'>Treatment
                </label>
                <label>
                    <input type='checkbox' name='category' value='suicide'>Suicide Prevention
                </label>
                <label>
                    <input type='checkbox' name='category' value='crisis'>Crisis Support
                </label>
                <label>
                    <input type='checkbox' name='category' value='chat'>Chat
                </label>
            </div>
        </label>
    </div>
    <div class='mode-filter'>
        <label>Location: <br>
            <div class='categories'>
                <label>
                    <input type='checkbox' name='location' value='north'>North
                </label>
                <label>
                    <input type='checkbox' name='location' value='south'>South
                </label>
                <label>
                    <input type='checkbox' name='location' value='east'>East
                </label>
                <label>
                    <input type='checkbox' name='location' value='west'>West
                </label>
                <label>
                    <input type='checkbox' name='location' value='central'>Central
                </label>
                <label>
                    <input type='checkbox' name='location' value='online'>Online
                </label>
            </div>
        </label>
    </div>
</div>
<div id='filter-button'>Filter Results</div>

<script>

    document.getElementById("filter-button").addEventListener("click", showFilters);

    function showFilters() {
        var filters = document.getElementById("filters");
        var button = document.getElementById("filter-button");
        button.classList.toggle('collapse');
        if (filters.style.maxHeight) {
            filters.style.maxHeight = null;
        } else {
            filters.style.maxHeight = '200px';
        }
    }

    var slider = document.getElementById("priceRange");
    var price = document.getElementById("price");

    slider.oninput = function() {
        price.value = this.value;
    }

    price.oninput = function() {
        slider.value = this.value;
    }

</script>