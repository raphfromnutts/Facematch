<?php

$mysqli = new mysqli('localhost', 'root', '', 'facemash');
if($_GET['lastid']){
	$e = $_GET['lastid'];
	$qGet = $mysqli->query('
	        SELECT token, name, path, score, class
	        FROM photosgirl
	        ORDER BY score ASC');
	while ($dGet = $qGet->fetch_object())
	    $rows[] = $dGet;
	$a = $e + 1;
	$b = $a + 10;
    $fin = count($rows);
    if ($a != $fin){
		while ($a!=$b and $a!=$fin)
	    {

	    ?>

	       <tr class="item" id="<?php echo ($a); ?>">
	           <td class="vignette"><img src="<?php echo htmlspecialchars($rows[$a]->path); ?>" alt="<?php echo htmlspecialchars($rows[$a]->path); ?>" data-token="<?php echo $rows[$a]->token; ?>" data-score="<?php echo $rows[$a]->score; ?>" width="266" height="400" /></td>
	           <?php
               if ($fin - $a == 1){
               ?>
               <td class="rank"><img src="images/r1.png" /></td>
               <?php
               }
               elseif ($fin - $a == 2){
               ?>
               <td class="rank"><img src="images/r2.png" /></td>
               <?php
               }
               elseif ($fin - $a == 3){
               ?>
               <td class="rank"><img src="images/r3.png" /></td>
               <?php
               }
               else{
               ?>
                <td class="rank"><?php echo '#', ($fin - $a); ?></td>
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
	}
}
?>