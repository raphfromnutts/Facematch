<?php 
// Ouvre un dossier bien connu, et liste tous les fichiers 
$directory1 = 'accueil/boy'; 
// Définition d'$image comme tableau 
$image = array(); 
//on vérifie s’il s’agit bien d’un répertoire 
if (is_dir($directory1)) 
{ 
//on ouvre le repertoire 
if ($dh = opendir($directory1)) 
{ 
//Lit une entrée du dossier et readdir retourne le nom du fichier 
while (($file = readdir($dh)) !== false) 
{ 
// Vérifie de ne pas prendre en compte les dossier ... 
if ($file != '...' && $file != '..' && $file != '.') 
{ 
// On ajoute le nom du fichier dans le tableau 
$image[] = $file; 
} 
} 
//On ferme le repertoire 
closedir($dh); 
// On récupère le nombre d'image total 
$total = count($image)-1; 
// On prend une valeur au hasard entre 1 et le nombre total d'images 
$aleatoire=0;
$aleatoire = rand(0, $total);
// On récupère le nom de l'image avec le chiffre hasard 
$image_afficher = "$image[$aleatoire]";
}
}
// Ouvre un dossier bien connu, et liste tous les fichiers 
$directory2 = 'accueil/girl'; 
// Définition d'$image comme tableau 
$image = array(); 
//on vérifie s’il s’agit bien d’un répertoire 
if (is_dir($directory2)) 
{ 
//on ouvre le repertoire 
if ($dh = opendir($directory2)) 
{ 
//Lit une entrée du dossier et readdir retourne le nom du fichier 
while (($file = readdir($dh)) !== false) 
{ 
// Vérifie de ne pas prendre en compte les dossier ... 
if ($file != '...' && $file != '..' && $file != '.') 
{ 
// On ajoute le nom du fichier dans le tableau 
$image[] = $file; 
} 
} 
//On ferme le repertoire 
closedir($dh); 
// On récupère le nombre d'image total 
$total = count($image)-1; 
// On prend une valeur au hasard entre 1 et le nombre total d'images 
$aleatoire=0;
$aleatoire = rand(0, $total);
// On récupère le nom de l'image avec le chiffre hasard 
$image_afficher2 = "$image[$aleatoire]";
}
}
?>