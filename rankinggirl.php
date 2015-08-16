<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/png" href="images/favicon.png" />
        <title>FaceMatch - Classement Girl</title>
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
        $(window).scroll(function(){
  
          if($(window).scrollTop() == $(document).height() - $(window).height()){

            $.ajax({
              
              url : "loadgirl.php?lastid=" + $(".item:last").attr("id"),
              success: function(html){
                if(html){
                  $("tbody").append(html);
                }
              }

            });

          }

        });
        function option(){
          var option1 = document.getElementById('option').style.display
          if (option1 == 'none'){
            document.getElementById('option').style.display='block';
          }else{
            document.getElementById('option').style.display='none';
            document.getElementById('option1').style.display='none';
            document.getElementById('option2').style.display='none';
            document.getElementById('option3').style.display='none';
          }
        }
        function option1(){
          var option1 = document.getElementById('option1').style.display
          if (option1 == 'none'){
            document.getElementById('option1').style.display='block';
            document.getElementById('option2').style.display='none';
            document.getElementById('option3').style.display='none';
          }else{
            document.getElementById('option1').style.display='none';
            document.getElementById('option2').style.display='none';
            document.getElementById('option3').style.display='none';
          }
        }
        function option2(){
          var option1 = document.getElementById('option2').style.display
          if (option1 == 'none'){
            document.getElementById('option1').style.display='none';
            document.getElementById('option2').style.display='block';
            document.getElementById('option3').style.display='none';
          }else{
            document.getElementById('option1').style.display='none';
            document.getElementById('option2').style.display='none';
            document.getElementById('option3').style.display='none';
          }
        }
        function option3(){
          var option1 = document.getElementById('option3').style.display
          if (option1 == 'none'){
            document.getElementById('option1').style.display='none';
            document.getElementById('option2').style.display='none';
            document.getElementById('option3').style.display='block';
          }else{
            document.getElementById('option1').style.display='none';
            document.getElementById('option2').style.display='none';
            document.getElementById('option3').style.display='none';
          }
        }
        </script>
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
        <p style="display:block; text-align:center; margin-bottom:10px; margin-top:32px; line-height:25px;">Clique pour choisir :<br><a href="rankingboy.php" style="color:black; text-decoration:none;">Classement Boy</a> - <a href="#" style="color:black; text-decoration:none; font-weight:bold;">Classement Girl</a></p>
        <p style="display:block; text-align:center; line-height:25px; font-weight:bold;"><a href="javascript:option()" style="color:black; text-decoration:none;">&nabla; Filtre sup. &nabla;</a></p>
        <p id="option" style="display:none; text-align:center;  line-height:25px;">Filtrer par : <a href="javascript:option1()" style="color:black; text-decoration:none;">NOM</a> - <a href="javascript:option2()" style="color:black; text-decoration:none;">CLASSE</a> - <a href="javascript:option3()" style="color:black; text-decoration:none;">SCORE</a></p>
        <form id="option1" style="display:none; text-align:center;  line-height:25px;" action="rankinggirlname.php" method="get"><input type="text" name="search"><br><input type="submit" value="Go ..."></form>
        <form id="option2" style="display:none; text-align:center;  line-height:25px;" action="rankinggirlname.php" method="get"><input type="text" name="search"><br><input type="submit" value="Go ..."></form>
        <p id="option3" style="display:none; text-align:center;  line-height:25px;">ORDRE <a href="rankinggirlcr.php" style="color:black; text-decoration:none;">CROISSANT</a> / <a href="#" style="color:black; text-decoration:none; font-weight:bold;">DÉCROISSANT</a></p>
        <table>
          <tr>
               <th class="vignette"></th>
               <th>Rang</th>
               <th>Nom</th>
               <th>Classe</th>
               <th>Score</th>
           </tr>

        <?php

        $mysqli = new mysqli('localhost', 'root', '', 'facemash');

        $query = 'SELECT @rang:=@rang+1 AS classement, token, name, path, score, class FROM rankgirl, (SELECT @rang:=0) tmp LIMIT 0, 10';

        $result = mysqli_query($mysqli, $query);

        while($res = mysqli_fetch_object($result)){

        ?>

           <tr class="item" id="<?php echo ($res->classement); ?>">
               <td class="vignette"><img src="<?php echo htmlspecialchars($res->path); ?>" alt="<?php echo htmlspecialchars($res->path); ?>" data-token="<?php echo $res->token; ?>" data-score="<?php echo $res->score; ?>" width="266" height="400" /></td>
               <?php
               if ($res->classement == 1){
               ?>
               <td class="rank"><img src="images/r1.png" /></td>
               <?php
               }
               elseif ($res->classement == 2){
               ?>
               <td class="rank"><img src="images/r2.png" /></td>
               <?php
               }
               elseif ($res->classement == 3){
               ?>
               <td class="rank"><img src="images/r3.png" /></td>
               <?php
               }
               else{
               ?>
                <td class="rank"><?php echo '#', ($res->classement); ?></td>
               <?php
               }
               ?>
               <td><?php echo htmlspecialchars($res->name); ?></td>
               <td><?php echo htmlspecialchars($res->class); ?></td>
               <td><?php echo number_format($res->score, 0, ',', ' '); ?></td>
           </tr>

        <?php

        }

        ?>

        </table>
        <img src="images/loader.gif" alt="Chargement..." width="64" height="64" id="loader_rank" />
        <p id="message_fin" style="display:none; text-align:center; margin-top:32px; margin-bottom:32px;">Fin du classement</p>
        <footer id="footer_fin"style="display:none;">©2015 - S&K - facematch.com - <a href="contact.php">Nous contacter</a></footer>
    </body>
</html>