<?php
	$weather = "";
	$error = "";
	$notExists = false;
	if ($_GET["city"]) {
		$cityName = $_GET["city"];
		$cityName = str_replace(' ', '', $cityName);
		$cityURL = "https://www.weather-forecast.com/locations/".$cityName."/forecasts/latest";
		$file_headers = @get_headers($cityURL);
		if ($file_header[0] == 'HTTP/1.1 404 Not Found') {
			$notExists = true;
			// $error = $error."That city could not be found. ";
		} else {
			$forecastPage = file_get_contents($cityURL);
			$pageArray = explode("(1&ndash;3 days)</span><p class=\"b-forecast__table-description-content\"><span class=\"phrase\">", $forecastPage);
			$secondPageArray = explode("</span></p></td>", $pageArray[1]);
			$weather = $secondPageArray[0];
		}
		
	}
?>

<!doctype html>
<html lang="en">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style type="text/css">
			html {
				background: url("https://cdn.pixabay.com/photo/2014/08/09/15/45/sky-414199_1280.jpg") no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			
			body {
				background: none;
			}
			
			.container {
				text-align: center;
				margin-top: 100px;
				width: 450px;
			}
			
			input {
				margin: 20px 0;
			}
			
			#weather {
				margin-top: 15px;
			}
		</style>

		<title>Weather Scraper</title>
  	</head>
  	<body>
		
		<div class="container">
			<h1>
				What's the weather?
			</h1>
			
			<form>
				<div class="form-group">
					<fieldset class="form-group">
						<label for="city">Enter the name of a city. </label>
    					<input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php echo $_GET["city"]; ?>">
					</fieldset>
					<button type="submit" class="btn btn-primary">Submit</button>
  				</div>
			</form>
			<div id="weather">
				<?php 
					if ($weather) {
						echo "<div class=\"alert alert-success\" role=\"alert\">".$weather."</div>";
					} else if ($notExists) {
						echo "<div class=\"alert alert-danger\" role=\"alert\">"."Something"."</div>";
					}
				?>
			</div>
			
		</div>
		
	  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  	</body>
</html>