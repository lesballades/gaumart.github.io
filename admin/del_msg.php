<?php 
include('connect.php');
//démarrage SESSION
session_start();

//Recup variables de session et test si bien admin
if(isset($_SESSION['login']) && isset($_SESSION['pass'])){

    //Verif si id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        /*Suppression du message*/
        $bdd->exec("DELETE FROM contact WHERE id='".$id."'");
    }
}
header('location: index.php');
?>
