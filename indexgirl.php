<?php
require_once('init.php');
require_once('processgirl.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" type="image/png" href="images/favicon.png" />
        <title>Facematch - Girls</title>
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
            <div class="logo" id="red">
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            <div id="podium">
                <a href="rankinggirl.php" style="cursor:pointer;"><img src="images/123.png" /></a>
            </div>
        </header>
        <p id="second">Laquelle est ta préférée ? Clique pour choisir.</p>
        <div id="dual">
            <?php require_once('ajax/ajax.dualgirl.php'); ?>
        </div>
        <footer>©2015 - S&K - facematch.com - <a href="contact.php">Nous contacter</a></footer>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".photosgirl").click(function() {
                    $("#loader").fadeIn("fast");
                    var tokenFirst  = $(".facesgirl:first-child .photosgirl").attr("data-token"),
                        tokenSecond = $(".facesgirl:last-child .photosgirl").attr("data-token"),
                        scoreFirst  = $(".facesgirl:first-child .photosgirl").attr("data-score"),
                        scoreSecond = $(".facesgirl:last-child .photosgirl").attr("data-score"),
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
                        url: "indexgirl.php",
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