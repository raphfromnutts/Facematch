<?php

$mysqli = new mysqli('localhost', 'root', '', 'facemash');

if($_GET['lastid']){

 	$query = 'SELECT @rang:=@rang+1 AS classement, token, name, path, score, class FROM rankboy, (SELECT @rang:=0) tmp LIMIT 10 OFFSET '.$_GET['lastid'].'';

	$result = mysqli_query($mysqli, $query);

	while($res = mysqli_fetch_object($result)){

	?>

	   <tr class="item" id="<?php echo ($res->classement + $_GET['lastid']); ?>">
	       <td class="vignette"><img src="<?php echo htmlspecialchars($res->path); ?>" alt="<?php echo htmlspecialchars($res->path); ?>" data-token="<?php echo $res->token; ?>" data-score="<?php echo $res->score; ?>" width="266" height="400" /></td>
	       <?php
	       if ($res->classement + $_GET['lastid'] == 1){
	       ?>
	       <td class="rank"><img src="images/r1.png" /></td>
	       <?php
	       }
	       elseif ($res->classement + $_GET['lastid'] == 2){
	       ?>
	       <td class="rank"><img src="images/r2.png" /></td>
	       <?php
	       }
	       elseif ($res->classement + $_GET['lastid'] == 3){
	       ?>
	       <td class="rank"><img src="images/r3.png" /></td>
	       <?php
	       }
	       else{
	       ?>
	        <td class="rank"><?php echo '#', ($res->classement + $_GET['lastid']); ?></td>
	       <?php
	       }
	       ?>
	       <td><?php echo htmlspecialchars($res->name); ?></td>
	       <td><?php echo htmlspecialchars($res->class); ?></td>
	       <td><?php echo number_format($res->score, 0, ',', ' '); ?></td>
	   </tr>

	<?php

	}

}

?>