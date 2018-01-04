<?php include('connect.php');

//SESSION
session_start();

//LOGOUT
if(isset($_POST['logout'])){
    //destruction des variables de SESSION
    session_unset();
    //destruction SESSION
    session_destroy();
}


//function control data
    function test_input($data) {
        $data = trim($data);//remove whitespace
        $data = stripslashes($data);//remove antislash
        $data = htmlspecialchars($data);//verif balise html failed
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <title>GAUMART Admin</title>
        <link rel="icon" type="image/x-ico" href="../../assets/img/logo_gaumart_ico.png">
        
        <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    </head>
    <body>

<?php
    
//LOGIN    
/* Si log verif data co et accès page contact_msg */
if(isset($_POST['login']) && isset($_POST['pwd'])){

    //verif input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $log = test_input($_POST["login"]);
        $pass = test_input($_POST["pwd"]);
    
        /* Verif admin */
        $co = $bdd->query('SELECT * FROM login')->fetch();
        if($co['log']==$log && $co['pwd']==$pass){
            $_SESSION["login"]=$_POST['login'];
            $_SESSION["pass"]=$_POST['pwd'];
            header('location: index.php');
        }
    }
}
?>
<!--Formulaire de connexion-->
        <form id="log" action="login.php" method="post">
            <fieldset>
                <legend>Connexion admin</legend>
                <label>Login : <input autfocus required type="text" name="login"><br/></label>
                <label>Password : <input required type="password" name="pwd"><br/></label>
                <input type="submit" value="Connexion"/>
            </fieldset>
        </form>

    </body>
</html>