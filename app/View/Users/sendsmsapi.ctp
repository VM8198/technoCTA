<?php
// 	// Authorisation details.
// 	$username = "geetchhokermtr@gmail.com";
// 	$hash = "3ce7ef074293e5f8919a2c1b8ddbd5d073d09d3a6a38adc518cfea71af26ea2f";

// 	// Config variables. Consult http://api.txtlocal.com/docs for more info.
// 	$test = "0";

// 	// Data for text message. This is the text message data.
// 	$sender = "API Test"; // This is who the message appears to be from.
// 	$numbers = "8869843679"; // A single number or a comma-seperated list of numbers
// 	$message = "This is a test message from the PHP API script.";
// 	// 612 chars or less
// 	// A single number or a comma-seperated list of numbers
// 	$message = urlencode($message);
// 	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
// 	$ch = curl_init('http://api.txtlocal.com/send/?');
// 	curl_setopt($ch, CURLOPT_POST, true);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$result = curl_exec($ch); // This is the result from the API
// 	curl_close($ch);
	
// 	echo "<pre>";
// 	print_r($result);exit;

	$username = "ruby13@technocta.co.uk";
		$hash = "79b84c60e892a073abcc3f4d1680608c9e9b5059";

		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "API Test"; // This is who the message appears to be from.
		$numbers = "+918869843679"; // A single number or a comma-seperated list of numbers
		$message = "This is a test message from the php API Script.";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.txtlocal.com/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
		echo "<pre>";
		print_r($result);exit;
?>