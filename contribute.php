<?php
    include 'header.php';
    if (isset($_GET['contribute'])) { 
?>

<div class='form-success'>
    <div>Thank you for your contribution!</div>
    <img class='mascot' src='images/form_success.png'>
    <div>Have a nice day!</div>
    <div>-MindSite</div>
</div>

<?php } else { ?>

<div class='form-container'>
    <p class='form-header'>Thank you for helping us make mental resources more accessible!</p>
    <p class='form-subheader'>We will contact you if we require more information.</p>
    <form class='form' action='submit_contribution.php' method='post'>
        <div class='form-field'>
            <div class='form-prompt'>
                Name of organisation: 
            </div>
            <div class='form-input'>
                <input type='text' name='name'>
                <label class='radio-label'>Private
                    <input type='radio' name='type' value='private'>
                    <span class='radio'></span>
                </label>
                <label class='radio-label'>Government
                    <input type='radio' name='type' value='government'>
                    <span class='radio'></span>
                </label>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Types of services: 
            </div>
            <div class='form-input'>
                <input type='text' name='service'>
                <label class='radio-label'>In-person
                    <input type='radio' name='servicemode' value='inperson'>
                    <span class='radio'></span>
                </label>
                <label class='radio-label'>Online
                    <input type='radio' name='servicemode' value='online'>
                    <span class='radio'></span>
                </label>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Specialisation:
            </div>
            <div class='form-input'>
                <input type='text' name='specialisation'>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Website: 
            </div>
            <div class='form-input'>
                <input type='text' name='website'>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Contact details: 
            </div>
            <div class='form-input'>
                <input type='text' name='contact'>
            </div>
        </div>
        <div class='submit'>
            <input type='submit' name='submit' value='Submit'>
        </div>
    </form>
</div>

<?php } ?>
</div>
</body>
</html>