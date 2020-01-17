<?php
	$error = "";
	$successMessage = "";
	if ($_POST) {
		if (!$_POST["email"]) {
			$error .= "An email address is required.<br>";
		}
		if (!$_POST["content"]) {
			$error .= "The content is required.<br>";
		}
		if (!$_POST["subject"]) {
			$error .= "An subject is required.<br>";
		}
		if ($_POST && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
			$error .= "The email address is invalid.<br>";
		}
		if ($error != "") {
			$error = "<div class=\"alert alert-danger\" role=\"alert\"><p><strong>There were error(s) in your form:</strong></p>".$error."</div>";
		} else {
			$emailTo = "me@mydomain.com";
			$subject = $_POST["subject"];
			$content = $_POST["content"];
			$headers = "From: ".$_POST["email"];
			
			if (mail($emailTo, $subject, $content, $headers)) {
				$successMessage = "<div class=\"alert alert-success\" role=\"alert\">Your message was sent, we\'ll get back to you ASAP!</div>";
			} else {
				$error = "<div class=\"alert alert-danger\" role=\"alert\">Your message couldn\'t be sent - please try again later</div>";
			}
		}
	}
?>