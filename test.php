<?php /* change to email address(s) */ ?>
<? $headers = 'From: booking@technocta.co.uk'; mail('booking@technocta.co.uk', 'Test email using PHP', 'This is a test email message', $headers, '-booking@technocta.co.uk'); ?>