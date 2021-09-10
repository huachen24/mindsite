<div id='filters'>

    <div id='filter1'>
        <div class='price-filter'>
            <label>Cost: <br>
                <label>    
                    <input type='radio' name='price' value='2'>All
                </label>
                <label>
                    <input type='radio' name='price' value='0'>Free
                </label>
                <label>
                    <input type='radio' name='price' value='1'>Paid
                </label>
            </label>
        </div>

        <div class='age-filter'>
            <label>Your age: <br>
                <input type='number' id='age' name='age' min='0' max='100' value='0'>
            </label>
        </div>
        
        <div class='location-filter'>
            <label>Location: <br>
                <div class='categories'>
                    <label>
                        <input type='checkbox' name='location[]' value='All'>All
                    </label>
                    <label>
                        <input type='checkbox' name='location[]' value='North'>North
                    </label>
                    <label>
                        <input type='checkbox' name='location[]' value='South'>South
                    </label>
                    <label>
                        <input type='checkbox' name='location[]' value='East'>East
                    </label>
                    <label>
                        <input type='checkbox' name='location[]' value='West'>West
                    </label>
                    <label>
                        <input type='checkbox' name='location[]' value='Central'>Central
                    </label>
                    <label>
                        <input type='checkbox' name='location[]' value='Online'>Online
                    </label>
                </div>
            </label>
        </div>
    </div>

    <div id='filter2'>
        <div class='type-filter'>
            <label>Types: <br>
                <input type="text" placeholder="Search..." id="typesearch" onkeyup="typeFilter()"><br>
                <div id="types" class="drop-content">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM types");
                        if ($result == FALSE) {
                            echo "No type filters";
                        } else {
                            $queryResult = mysqli_num_rows($result);
                            if ($queryResult > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<label><input type='checkbox' name='type[]' value='".$row['type']."'>".$row['type']."</label>";
                                }
                            } else {
                                echo "No type filters";
                            }
                        }
                    ?>
                </div>
            </label>
        </div>
    
        <div class='specialty-filter'>
            <label>Specialties: <br>
                <input type="text" placeholder="Search..." id="specialtysearch" onkeyup="specialtyFilter()"><br>
                <div id="specialties" class="drop-content">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM specialties");
                        if ($result == FALSE) {
                            echo "No specialty filters";
                        } else {
                            $queryResult = mysqli_num_rows($result);
                            if ($queryResult > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<label><input type='checkbox' name='specialty[]' value='".$row['specialty']."'>".$row['specialty']."</label>";
                                }
                            } else {
                                echo "No specialty filters";
                            }
                        }
                    ?>
                </div>
            </label>
        </div>

        <div class='modality-filter'>
            <label>Modalities: <br>
                <input type="text" placeholder="Search..." id="modalitysearch" onkeyup="modalityFilter()"><br>
                <div id="modalities" class="drop-content">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM modalities");
                        if ($result == FALSE) {
                            echo "No modality filters";
                        } else {
                            $queryResult = mysqli_num_rows($result);
                            if ($queryResult > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<label><input type='checkbox' name='modality[]' value='".$row['modality']."'>".$row['modality']."</label>";
                                }
                            } else {
                                echo "No modality filters";
                            }
                        }
                    ?>
                </div>
            </label>
        </div>
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
            filters.style.maxHeight = '1800px';
        }
    }

    function typeFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("typesearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("types");
        a = div.getElementsByTagName("label");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function specialtyFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("specialtysearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("specialties");
        a = div.getElementsByTagName("label");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function modalityFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("modalitysearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("modalities");
        a = div.getElementsByTagName("label");
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