<?php  
    define( 'MAIL_TO', /* >>>>> */'sambenuts.contact@gmail.com'/* <<<<< */ );  //ajouter votre courriel  
    define( 'MAIL_FROM', '' ); // valeur par dÃ©faut  
    define( 'MAIL_OBJECT', '' ); // valeur par dÃ©faut  
    define( 'MAIL_MESSAGE', '' ); // valeur par dÃ©faut 
    $mailSent = false; // drapeau qui aiguille l'affichage du formulaire OU du rÃ©capitulatif  
    $errors = array(); // tableau des erreurs de saisie 
    if( filter_has_var( INPUT_POST, 'send' ) ) // le formulaire a Ã©tÃ© soumis avec le bouton [Envoyer]  
    {  
        $from = filter_input( INPUT_POST, 'from', FILTER_VALIDATE_EMAIL );  
        if( $from === NULL || $from === MAIL_FROM ) // si le courriel fourni est vide OU Ã©gale Ã  la valeur par dÃ©faut  
        {
            $errors[] = 'Vous devez renseigner votre adresse mail.';  
        }  
        elseif( $from === false ) // si le courriel fourni n'est pas valide  
        {  
            $errors[] = 'Le mail n\'est pas valide.';  
            $from = filter_input( INPUT_POST, 'from', FILTER_SANITIZE_EMAIL );  
        }  
        $object = filter_input( INPUT_POST, 'object', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_LOW );  
        if( $object === NULL OR $object === false OR empty( $object ) OR $object === MAIL_OBJECT ) // si l'objet fourni est vide, invalide ou Ã©gale Ã  la valeur par dÃ©faut  
        {  
            $errors[] = 'Vous devez renseigner un titre à votre message.';  
        }  
        $message = filter_input( INPUT_POST, 'message', FILTER_UNSAFE_RAW );  
        if( $message === NULL OR $message === false OR empty( $message ) OR $message === MAIL_MESSAGE ) // si le message fourni est vide ou Ã©gale Ã  la valeur par dÃ©faut  
        {  
            $errors[] = 'Vous devez écrire un message.';  
        }  
        if( count( $errors ) === 0 ) // si il n'y a pas d'erreurs  
        {  
            if( mail( MAIL_TO, $object, $message, "From: $from\nReply-to: $from\n" ) ) // tentative d'envoi du message  
            {  
                $mailSent = true;  
            }  
            else // échec de l'envoi  
            {  
                $errors[] = 'Votre message n\'a pas été envoyé.';  
            }  
        }  
    }  
    else // le formulaire est affichÃ© pour la premiÃ¨re fois, avec les valeurs par dÃ©faut  
    {  
        $from = MAIL_FROM;  
        $object = MAIL_OBJECT;  
        $message = MAIL_MESSAGE;  
    }  
?>  
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="icon" type="image/png" href="images/favicon_bg.png" />
        <title>FaceMatch - Contact</title>
		<script src="sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
		<style type="text/css">  
		html{ font-family:Berlin sans FB; margin:0; padding:0; font-size:.88em;}  
		body{ margin:0 auto; padding:0; }  
		textarea{ width:772px; }  
		label{ display:block; font-weight:bold; }  
		p#welcome{ padding:10px 20px; border:1px dotted #00f; color:#00f; font-weight:bold; }  
		ul{ padding:10px 20px; border:1px dotted #f00; color:#f00; font-weight:bold; }  
		p#success{ padding:10px 20px; border:1px dotted #0f0; color:#0f0; font-weight:bold; }  
		p em{ display:block; font-weight:normal; }  
		.logo { width: 100%; height: 100px; }
		.logo img{ position: relative; left: 50vw; margin-top:21.5px; margin-left:-210.5px; height:57px; width:421px; }
		#black{ background: black; opacity:0.65;}
		#podiumopa{ position:absolute; top:30px; right:15px; opacity:0.65; }
		#largeur{ width:772px; margin:0 auto; }
        </style>
    </head>
    <body>
		<header>
            <div class="logo" id="black">
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            <div id="podiumopa">
                <a href="rankingboy.php" style="cursor:pointer;"><img src="images/123.png" /></a>
            </div>
        </header>
        <div id="largeur">
        <h1>Nous contacter</h1>  
        <hr/>  
<?php 
    if( $mailSent === true ) // si le message a bien Ã©tÃ© envoyÃ©, on affiche le rÃ©capitulatif  
    {  
?>  
        <p id="success">Votre message a bien été envoyé.</p>  
        <p><strong>Votre mail :</strong><br /><?php echo( $from ); ?></p>  
        <p><strong>Titre du message :</strong><br /><?php echo( $object ); ?></p>  
        <p><strong>Votre message :</strong><br /><?php echo( nl2br( htmlspecialchars( $message ) ) ); ?></p>  
<?php  
    }  
    else // le formulaire est affichÃ© pour la premiÃ¨re fois ou le formulaire a Ã©tÃ© soumis mais contenait des erreurs  
    {  
        if( count( $errors ) !== 0 )  
        {  
            echo( "\t\t<ul>\n" );  
            foreach( $errors as $error )  
            {  
                echo( "\t\t\t<li>$error</li>\n" );  
            }  
            echo( "\t\t</ul>\n" );  
        }  
        else  
        {  
            echo( "\t\t<p id=\"welcome\"><em>Tous les champs sont obligatoires</em></p>\n" );  
        }  
?>  
        <form id='contact' method="post" action="<?php echo( $_SERVER['REQUEST_URI'] ); ?>">  
            <p>  
                <label for="from">Votre mail :</label>  
                <input type="text" name="from" id="from" value="<?php echo( $from ); ?>" />  
            </p>  
            <p>  
                <label for="object">Titre du message :</label>  
                <input type="text" name="object" id="object" value="<?php echo( $object ); ?>" />  
            </p>   
            <p>  
                <label for="message">Votre message :</label>  
                <textarea name="message" id="message" rows="20" cols="80"><?php echo( $message ); ?></textarea>  
            </p>  
            <p>  
                <input type="submit" name="send" value="Envoyer" />  
            </p>  
        </form>  
    </div>
<?php  
    }  
?>  
    </body>  
</html>