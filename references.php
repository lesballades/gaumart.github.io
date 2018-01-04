<?php 
/*Array contenant logo*/
$dir = "assets/img/logos/";
$logo = scandir($dir);

/*Affichage des logos*/
foreach($logo as $img){
    $format = strstr($img, ".");
    if($format == ".png" || $format == ".jpg"){
        echo '<img class="logosimg" src="assets/img/logos/'.$img.'" alt="logo partenaires">';
    }
}
?>
