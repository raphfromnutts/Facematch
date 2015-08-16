<?php require "imaleatoire.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" type="image/png" href="images/favicon_bg.png" />
        <title>FaceMatch</title>
		<script src="sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="fond">
			<img src="images/fond.png" />
		</div>
		<header>
            <div class="logo" id="black">
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            <div id="podiumopa">
                <a href="rankingboy.php" style="cursor:pointer;"><img src="images/123.png" /></a>
            </div>
        </header>
		<div class="text" id="ques">
			<p>CHOISIS :</p>
		</div>
		<div class="borg">
			<img src="images/borg.png" />
		</div>
		<div class="imbg">
			<?php print "<img id='img1' src='$directory1/$image_afficher'>"; ?>
		</div>
		<div class="imgg">
			<?php print "<img id='img2' src='$directory2/$image_afficher2'>"; ?>
		</div>
		<div class="imb">
			<a href="indexgirl.php"><img src="images/imb.png" /></a>
		</div>
		<div class="img">
			<a href="indexboy.php"><img src="images/img.png" /></a>
		</div>
		<div class="imbphone">
			<a href="indexgirl.php"><img src="images/imbphone.png" /></a>
		</div>
		<div class="imgphone">
			<a href="hindexboy.php"><img src="images/imgphone.png" /></a>
		</div>
	</body>
</html>