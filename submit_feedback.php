<?php

    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $user = $_POST['user'];
        $details = $_POST['details'];
        $email = $_POST['email'];

        $mailTo = 'ENTER EMAIL HERE';
        $subject = '[MindSite] New Feedback';
        $headers = 'From: MindSite';
        $msg = "New feedback from MindSite:\n\n
                Type of feedback: ".$type."\n
                User type: ".$user."\n
                User email: ".$email."\n
                Details: ".$details;

        // mail ($mailTo, $subject, $msg, $headers);
        header("Location: feedback.php?feedback=success");
    }
?>