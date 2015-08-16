<?php

$mysqli = new mysqli('localhost', 'root', '', 'facemash');

$qGet = $mysqli->query('
        SELECT token, name, path, score, class
        FROM photosboy
        ORDER BY score ASC');
while ($dGet = $qGet->fetch_object())
    $rows[] = $dGet;
$a = 0;
$b = 10;
$c = count($rows)

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/png" href="images/favicon_blue.png" />
        <title>FaceMatch - Classement Boy (score croissant)</title>
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
        $(window).scroll(function(){
          if($(window).scrollTop() == $(document).height() - $(window).height()){
            $.ajax({
              url : "loadboycr.php?lastid=" + $(".item:last").attr("id"),
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
            <div class="logo" id="blue">
                <a href="index.php"><img src="images/logo.png" /></a>
            </div>
            <div id="podium">
                <a href="rankingboy.php" style="cursor:pointer;"><img src="images/123.png" /></a>
            </div>
        </header>
        <p style="display:block; text-align:center; margin-top:32px; margin-bottom:10px; line-height:25px;">Clique pour choisir :<br><a href="rankingboy.php" style="color:black; text-decoration:none; font-weight:bold;">Classement Boy</a> - <a href="rankinggirl.php" style="color:black; text-decoration:none;">Classement Girl</a></p>
        <p style="display:block; text-align:center; line-height:25px; font-weight:bold;"><a href="javascript:option()" style="color:black; text-decoration:none;">&nabla; Filtre sup. &nabla;</a></p>
        <p id="option" style="display:none; text-align:center;  line-height:25px;">Filtrer par : <a href="javascript:option1()" style="color:black; text-decoration:none;">NOM</a> - <a href="javascript:option2()" style="color:black; text-decoration:none;">CLASSE</a> - <a href="javascript:option3()" style="color:black; text-decoration:none;">SCORE</a></p>
        <form id="option1" style="display:none; text-align:center;  line-height:25px;" action="rankingboyname.php" method="get"><input type="text" name="search"><br><input type="submit" value="Go ..."></form>
        <form id="option2" style="display:none; text-align:center;  line-height:25px;" action="rankingboyname.php" method="get"><input type="text" name="search"><br><input type="submit" value="Go ..."></form>
        <p id="option3" style="display:none; text-align:center;  line-height:25px;">ORDRE <a href="#" style="color:black; text-decoration:none; font-weight:bold;">CROISSANT</a> / <a href="rankingboy.php" style="color:black; text-decoration:none;">DÉCROISSANT</a></p>
        <table>
          <tr>
               <th class="vignette"></th>
               <th>Rang</th>
               <th>Nom</th>
               <th>Classe</th>
               <th>Score</th>
           </tr>

        <?php

        while ($a!=$b and $a!=$c)

        {

        ?>

           <tr class="item" id="<?php echo ($a); ?>">
               <td class="vignette"><img src="<?php echo htmlspecialchars($rows[$a]->path); ?>" alt="<?php echo htmlspecialchars($rows[$a]->path); ?>" data-token="<?php echo $rows[$a]->token; ?>" data-score="<?php echo $rows[$a]->score; ?>" width="266" height="400" /></td>
               <?php
               if ($c - $a == 1){
               ?>
               <td class="rank"><img src="images/r1.png" /></td>
               <?php
               }
               elseif ($c - $a == 2){
               ?>
               <td class="rank"><img src="images/r2.png" /></td>
               <?php
               }
               elseif ($c - $a == 3){
               ?>
               <td class="rank"><img src="images/r3.png" /></td>
               <?php
               }
               else{
               ?>
                <td class="rank"><?php echo '#', ($c - $a); ?></td>
               <?php
               }
               ?>
               <td><?php echo htmlspecialchars($rows[$a]->name); ?></td>
               <td><?php echo htmlspecialchars($rows[$a]->class); ?></td>
               <td><?php echo number_format($rows[$a]->score, 0, ',', ' '); ?></td>
           </tr>

        <?php 

          $a += 1;
        }

        ?>

        </table>
        <img src="images/loader.gif" alt="Chargement..." width="64" height="64" id="loader_rank" />
        <p id="message_fin" style="display:none; text-align:center; margin-top:32px; margin-bottom:32px;">Fin du classement</p>
        <footer id="footer_fin"style="display:none;">©2015 - S&K - facematch.com - <a href="contact.php">Nous contacter</a></footer>
    </body>
</html>