<?php
    include 'header.php';
    if (isset($_GET['feedback'])) { 
?>

<div class='feedback-success'>
    <div>Thank you for your feedback!</div>
    <img src='images/feedback_success.png'>
    <div>Have a nice day!</div>
    <div>-MindSite</div>
</div>

<?php } else { ?>

<div class='feedback'>
    <form action='submit_feedback.php' method='post'>
        <div class='feedback-field'>
            <div class='feedback-prompt'>
                Feedback Type:
            </div>
            <div class='feedback-input'>
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
        <div class='feedback-field'>
            <div class='feedback-prompt'>
                User Type:
            </div>
            <div class='feedback-input'>
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
        <div class='feedback-field'>
            <div class='feedback-prompt'>
                Feedback Details:
            </div>
            <div class='feedback-input'>
                <textarea id='details' name='details' placeholder=''></textarea>
            </div>
        </div>
        <div class='feedback-field'>
            <div class='feedback-prompt'>
                Email:
            </div>
            <div class='feedback-input'>
                <input type='text' id='email' name='email' placeholder='OPTIONAL'>
            </div>
        </div>
        <input type='submit' name='submit' value='Submit'>
    </form>
</div>

<?php } ?>
</div>
</body>
</html>