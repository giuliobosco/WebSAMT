<?php
/*
 * Copyright 2018 Giulio Bosco (giuliobva@gmail.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
/*
 * project: <project-name> ([<project-git-url>])
 * description: <project-description>
 *
 * author: Giulio Bosco (giuliobva@gmail.com)
 * version: 1.0
 * date: <date>
 *
 * file: index.php
 */

include('../../../lib/php/string_helper.php');

$error = "";
$result = "";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$string = $_GET['string'];
	$method = $_GET['select'];

	$string = str_removeSpecialChars($string);

	if ($method == "farfallino") {
		for ($i = 0; $i < strlen($string); $i++) {
			$result .= $string[$i];

			if (is_vowel($string[$i])) {
				$result .= "f$string[$j]";
			}
		}
	} else if ($method == "palindromo") {
		$result = "";

		for ($i = strlen($string) - 1; $i >= 0; $i--) {
			if (is_numeric($string[$i])) {
				if ($string[$i] % 2 == 0) {
					$result .= '<span class="blue">';
				} else {
					$result .= '<span class="yellow">';
				}
			} else if (is_vowel($string[$i])) {
				$result .= '<span class="red">';
			} else {
				$result .= '<span class="green">';
			}

			$result .= $string[$i] . "</span>";

		}
	} else if ($method == "statistica") {
		$chars = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

		for ($i = 0; $i < count($chars); $i++) {
			$counter = substr_count($string, $chars[$i]);

			if ($counter > 0) {
				$result .= ($chars[$i] . ': ' . number_format(100 / strlen($string) * $counter,1) . '<br>');
			}
		}

	} else {
		$error = "No method is selected, please chose one!<br>";
	}

	if (strlen($string) > 1) {

	} else {
		$error .= "Please insert a string!";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Interactive String Server</title>

	<link rel="stylesheet" type="text/css" href="../../../lib/css/bootstrap.min.css">

	<style>
		.text {
			border: 1px #fff solid;
			border-bottom: 1px #000 solid;
		}

		.button {
			border: 1px #000 solid;
		}

		select {
			margin-top: 10px;
		}

		.blue {
			color: #00f;
		}

		.green {
			color: #0f0;
		}

		.red {
			color: #f00;
		}

		.yellow {
			color: #ff0;
		}
	</style>
</head>
<body>

<form class="col-md-4 col-md-offset-4 text-center" method="get" action="">
	<h1>Interactive String Server</h1>

	<input type="text" name="string" class="col-md-9 text" placeholder="string to execute">
	<input type="submit" value="execute" class="col-md-3 button">

	<select class="col-md-6 col-md-offset-3" name="select">
		<option name="select" value="chose">chose</option>
		<option name="farfallino" value="farfallino">farfallino</option>
		<option name="palindromo" value="palindromo">palindromo</option>
		<option name="statistica" value="statistica">statistica</option>
	</select>

	<div id="result" class="col-md-12">
		<h4><?php echo $result ?></h4>
	</div>
	<div class="col-md-12 red">
		<h4><?php echo $error ?></h4>
	</div>
</form>

</body>
</html>
