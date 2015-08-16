<?php
require_once('init.php');
require_once('processboy.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" type="image/png" href="images/favicon_blue.png" />
        <title>Facematch - Boys</title>
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    </head>
    <body>
        <div class="pub" id="left">
            <img src="images/pub.png" />
        </div>
        <div class="pub" id="right">
            <img src="images/pub.png" />
        </div>
        <header>
            <div class="logo" id="blue">
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            <div id="podium">
                <a href="rankingboy.php" style="cursor:pointer;"><img src="images/123.png" /></a>
            </div>
        </header>
        <p id="second">Lequel est ton préféré ? Clique pour choisir.</p>
        <div id="dual">
            <?php require_once('ajax/ajax.dualboy.php'); ?>
        </div>
        <footer>©2015 - S&K - facematch.com - <a href="contact.php">Nous contacter</a></footer>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".photosboy").click(function() {
                    $("#loader").fadeIn("fast");
                    var tokenFirst  = $(".facesboy:first-child .photosboy").attr("data-token"),
                        tokenSecond = $(".facesboy:last-child .photosboy").attr("data-token"),
                        scoreFirst  = $(".facesboy:first-child .photosboy").attr("data-score"),
                        scoreSecond = $(".facesboy:last-child .photosboy").attr("data-score"),
                        winner,
                        looser,
                        wScore,
                        lScore;

                        if (tokenFirst == $(this).attr("data-token"))
                        {
                            winner = tokenFirst;
                            looser = tokenSecond;
                            wScore = scoreFirst;
                            lScore = scoreSecond;
                        }
                        else
                        {
                            winner = tokenSecond;
                            looser = tokenFirst;
                            wScore = scoreSecond;
                            lScore = scoreFirst;
                        }

                    $.ajax({
                        type: "post",
                        url: "indexboy.php",
                        data: "winner=" + winner + "&looser=" + looser + "&wScore=" + wScore + "&lScore=" + lScore,
                        cache: false,
                        success: function(data) {
                            $("body").html(data);
                            $("#loader").fadeOut("fast");
                        }
                    });
                });
            });
        </script>
    </body>
</html>