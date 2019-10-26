<?php
	/*
	WhatsApp-Chat-Reader
	Version 1.1
	© 26.10.2019 https://github.com/f3lixdev
	*/

	// Chat-Config ---------------------------------
	$file = 'file.txt';
	$leftname  = 'name1';
	$rightname = 'name2';
	// ---------------------------------------------
?>
<html>
	<head>
		<title>WhatsApp-Chat-Reader</title>
		<style>
			html {
				font-family: Calibri;
				font-size: 12pt;
				font-weight: 500;
				background-image: url("background.jpg");
				height: 100%;
				background-position: bottom;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
				max-width: 700px;
				float: center;
				margin: auto;
				padding: 5px;
			}
			p {
				font-size: 13pt;
				width: 70%;
				max-width: 400px;
				border: 0px;
				border-radius: 5px;
				padding: 5px;
				margin: 5px;
			}
			.right {
				right: 0px;
				text-align: right;
				background-color: #66BB6A;
				float: right;
				/*margin-left: 200px;*/
			}
			.left {
				text-align: left;
				background-color: #FF7043;
				left: 0px;
				float: left;
			}
			.hidden {
				display: none;
			}
		</style>
	</head>
	<body>
		<?php
			$myfile = fopen($file, "r") or die("Unable to open file!");
			echo "<p>". preg_replace("~[0-9][0-9].[0-9][0-9].[0-9][0-9], [0-9][0-9]:[0-9][0-9] - ~", "</p><p class='hidden'>",
						str_replace("<Medien ausgeschlossen>", "[Media]",
						preg_replace("~[0-9][0-9].[0-9][0-9].[0-9][0-9], [0-9][0-9]:[0-9][0-9] - ".$leftname.":~", "</p><p class='left'>",
						preg_replace("~[0-9][0-9].[0-9][0-9].[0-9][0-9], [0-9][0-9]:[0-9][0-9] - ".$rightname.":~", "</p><p class='right'>",
						str_replace("\r\n", "<br>", fread($myfile,filesize($file)))))));
			fclose($myfile);

		?>
	</body>
</html>