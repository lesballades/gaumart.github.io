<?php
//__Conect Data Base__PDO => co secu:
    //try verif présence erreur, si il y a, catch.
    try{
        $bdd=new PDO ('mysql:host=localhost;dbname=gaumart;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>