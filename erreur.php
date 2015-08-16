<!DOCTYPE html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" type="image/png" href="images/favicon_bg.png" />
        <title>Facematch - ERREUR</title>
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="pub" id="left">
            <img src="images/pub.png" />
        </div>
        <div class="pub" id="right">
            <img src="images/pub.png" />
        </div>
        <header>
            <div class="logo" id="black">
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            <div id="podiumopa">
                <a href="rankingboy.php" style="cursor:pointer;"><img src="images/123.png" /></a>
            </div>
        </header>
		<p style="line-height:25px; text-align:center; margin:32px; font-size:25px;"><?php
		switch($_GET['erreur'])
		{
			case '400':
			echo 'Échec de l\'analyse HTTP.';
			break;
			case '401':
			echo 'Le pseudo ou le mot de passe n\'est pas correct !';
			break;
			case '402':
			echo 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
			break;
			case '403':
			echo 'Requête interdite !';
			break;
			case '404':
			echo 'La page n\'existe pas ou plus !';
			break;
			case '405':
			echo 'Méthode non autorisée.';
			break;
			case '500':
			echo 'Erreur interne au serveur ou serveur saturé.';
			break;
			case '501':
			echo 'Le serveur ne supporte pas le service demandé.';
			break;
			case '502':
			echo 'Mauvaise passerelle.';
			break;
			case '503':
			echo ' Service indisponible.';
			break;
			case '504':
			echo 'Trop de temps à la réponse.';
			break;
			case '505':
			echo 'Version HTTP non supportée.';
			break;
			default:
			echo 'Erreur !';
		}
		?><br>Clique <a href="index.php">ici</a> pour revenir à la page d'accueil.</p>
		<img style="position:relative; width: 380px; height: 380px; left: 50vw; margin-left: -190px;" src="images/error.png" />
		<footer>©2015, S&K, facematch.com</footer>
	</body>
</html>
