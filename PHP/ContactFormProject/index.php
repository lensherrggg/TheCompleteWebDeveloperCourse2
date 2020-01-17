<?php
	// $error = "";
	// $successMessage = "";
	// if ($_POST) {
	// 	if (!$_POST["email"]) {
	// 		$error .= "An email address is required.<br>";
	// 	}
	// 	if (!$_POST["content"]) {
	// 		$error .= "The content is required.<br>";
	// 	}
	// 	if (!$_POST["subject"]) {
	// 		$error .= "An subject is required.<br>";
	// 	}
	// 	if ($_POST && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
	// 		$error .= "The email address is invalid.<br>";
	// 	}
	// 	if ($error != "") {
	// 		$error = "<div class=\"alert alert-danger\" role=\"alert\"><p><strong>There were error(s) in your form:</strong></p>".$error."</div>";
	// 	} else {
	// 		$emailTo = "me@mydomain.com";
	// 		$subject = $_POST["subject"];
	// 		$content = $_POST["content"];
	// 		$headers = "From: ".$_POST["email"];
			
	// 		if (mail($emailTo, $subject, $content, $headers)) {
	// 			$successMessage = "<div class=\"alert alert-success\" role=\"alert\">Your message was sent, we\'ll get back to you ASAP!</div>";
	// 		} else {
	// 			$error = "<div class=\"alert alert-danger\" role=\"alert\">Your message couldn\'t be sent - please try again later</div>";
	// 		}
	// 	}
	// }
	include("includedfile.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Contact Form Project</title>
  </head>
  <body>
		<div class="container">
		  	<h1>Get in touch!</h1>
			<div id="success">
				<?php echo $successMessage; ?>
			</div>
			<div id="error">
				<?php echo $error; ?>
			</div>
			<form method="POST">
			  <div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
			  </div>
			  <div class="form-group">
				<label for="subject">Subject</label>
				<input type="text" class="form-control" id="subject" name="subject">
			  </div>
			  <div class="form-group">
				<label for="content">What would you like to ask us?</label>
				<textarea class="form-control" id="content" rows="3" name="content"></textarea>
			  </div>
			<button type="submit" class="btn btn-primary" id="submit">
				Submit
			</button>

			</form>
			
		</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	  <script type="text/javascript">
		$("form").submit(function (e) {
			e.preventDefault();
			var error = "";
			if ($("#email").val() == "") {
				error += "<p>The email field is required.</p>";
			}
			if ($("#subject").val() == "") {
				error += "<p>The subject field is required.</p>";
			}
			if ($("#content").val() == "") {
				error += "<p>The content field is required.</p>";
			}
			if (error != "") {
				$("#error").html("<div class=\"alert alert-danger\" role=\"alert\"><strong>There were error(s) in your form:</strong>"+ error +"</div>");
			}
		});
    </script>
    
  </body>
</html>