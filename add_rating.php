<?php
    include 'header.php';
?>

<form action="submit_rating.php" method="post">

<div>Price</div>
<input type="hidden" id="rid" name="rid" value="<?php echo $_POST['rid'];?>">
<div class="rate">
    <input type="radio" id="price5" name="price" value="5" />
    <label for="price5"></label>
    <input type="radio" id="price4" name="price" value="4" />
    <label for="price4"></label>
    <input type="radio" id="price3" name="price" value="3" />
    <label for="price3"></label>
    <input type="radio" id="price2" name="price" value="2" />
    <label for="price2"></label>
    <input type="radio" id="price1" name="price" value="1" />
    <label for="price1"></label>
</div>

<div>Convenience</div>
<div class="rate">
    <input type="radio" id="convenience5" name="convenience" value="5" />
    <label for="convenience5"></label>
    <input type="radio" id="convenience4" name="convenience" value="4" />
    <label for="convenience4"></label>
    <input type="radio" id="convenience3" name="convenience" value="3" />
    <label for="convenience3"></label>
    <input type="radio" id="convenience2" name="convenience" value="2" />
    <label for="convenience2"></label>
    <input type="radio" id="convenience1" name="convenience" value="1" />
    <label for="convenience1"></label>
</div>

<div>Overall</div>
<div class="rate">
    <input type="radio" id="overall5" name="overall" value="5" />
    <label for="overall5"></label>
    <input type="radio" id="overall4" name="overall" value="4" />
    <label for="overall4"></label>
    <input type="radio" id="overall3" name="overall" value="3" />
    <label for="overall3"></label>
    <input type="radio" id="overall2" name="overall" value="2" />
    <label for="overall2"></label>
    <input type="radio" id="overall1" name="overall" value="1" />
    <label for="overall1"></label>
</div>
<div>
<input type='submit' name='submit' value='Submit'>
</div>
</form>

</div>
</div>
</body>
</html>