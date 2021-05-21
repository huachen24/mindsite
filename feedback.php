<?php
    include 'header.php';
    if (isset($_GET['feedback'])) { 
?>

<div class='form-success'>
    <div>Thank you for your feedback!</div>
    <img class='mascot' src='images/form_success.png'>
    <div>Have a nice day!</div>
    <div>-MindSite</div>
</div>

<?php } else { ?>

<div class='form-container'>
    <p class='form-header'>Please leave your feedback below.</p>
    <form class='form' action='submit_feedback.php' method='post'>
        <div class='form-field'>
            <div class='form-prompt'>
                Feedback type:
            </div>
            <div class='form-input'>
                <label class='radio-label'>Removal of Resource
                    <input type='radio' checked='checked' name='type' value='remove'>
                    <span class='radio'></span>
                </label>
                <label class='radio-label'>Suggestion for Improvement
                    <input type='radio' checked='checked' name='type' value='improve'>
                    <span class='radio'></span>
                </label>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Organisation:
            </div>
            <div class='form-input'>
                <label class='radio-label'>Organisation
                    <input type='radio' checked='checked' name='user' value='organisation'>
                    <span class='radio'></span>
                </label>
                <label class='radio-label'>Individual
                    <input type='radio' checked='checked' name='user' value='individual'>
                    <span class='radio'></span>
                </label>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Feedback details:
            </div>
            <div class='form-input'>
                <textarea id='details' name='details' placeholder=''></textarea>
            </div>
        </div>
        <div class='form-field'>
            <div class='form-prompt'>
                Email:
            </div>
            <div class='form-input'>
                <input type='text' id='email' name='email' placeholder='OPTIONAL'>
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