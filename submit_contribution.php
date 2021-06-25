<?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $service = $_POST['service'];
        $servicemode = $_POST['servicemode'];
        $specialisation = $_POST['specialisation'];
        $website = $_POST['website'];

        $mailTo = 'info@hellosync.org';
        $subject = '[MindSite] New Contribution';
        $headers = 'From: MindSite';
        $msg = "New organisation for MindSite:\n\n
                Name: ".$name.", ".$type."\n
                Services provided: ".$service."\n
                Mode of service: ".$servicemode."\n
                Specialisation: ".$specialisation."\n
                Website: ".$website;

        mail($mailTo, $subject, $msg, $headers);
        header("Location: contribute.php?contribute=success");
    }
?>