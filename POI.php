<?php

//C'est le POI de l'utilisateur
echo "lat\tlon\ttitle\tdescription\ticon\ticonSize\ticonOffset\n";
echo "43.296482\t5.36978\tMoi\tMa Position\tpngegg.png\t24,24\t0,-24\n";

//1° - Connexion à la BDD
$base = new PDO('mysql:host=localhost; dbname=id20407984_pacov', 'id20407984_pacova', 'KF{[\LwgIH6~#MJr');
$base->exec("SET CHARACTER SET utf8");

//2° - Préparation de requette et execution
$retour = $base->query('SELECT *, get_distance_metres(\'43.296482\', \'5.36978\', equi_lat, equi_long) 
AS proximite 
FROM equipement 
HAVING proximite < 1000 ORDER BY proximite ASC
LIMIT 10;
');

//Boucle For
while ($data = $retour->fetch()){
echo $data['equi_lat']."\t".$data['equi_long']."\tMoi\tMa Position\tOl_icon_red_example.png\t24,24\t0,-24\n";
}

?>
