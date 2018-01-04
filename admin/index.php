<?php 
include('connect.php');

//démarrage SESSION
session_start();

//Recup variables de session et test si bien enregistrées
if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
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
        <header>
            <h1>Messages Gaumart</h1>
            <!--lien de deco-->
            <form action="login.php" method="post">
                <input type="submit" name="logout" value="Deconnect">
            </form>
        </header>
        
        <div class="row header">
            <div class="column header">Date</div>
            <div class="column header">Identité</div>
            <div class="column header">Contact</div>
            <div class="column header">Message</div>
            <div class="column header">Suppr</div>
        </div>
        <?php
        //envoit data 
            // faire tout les 10 derniers msg => LIMIT 0, 10
            $req = $bdd->query('SELECT * FROM contact ORDER BY id DESC');
            while($post = $req->fetch()){
                ?>
        <div class="row">
            <div class="column">
                <?php echo $post['date'];?>
            </div>
            <div class="column">
                <?php echo $post['nom'];?><br>
                <?php echo ' _<strong>'.$post['societe'].'</strong>';?>
            </div>
            <div class="column">
                <?php echo $post['tel'];?>
                <?php echo ' <a href="mailto:'.$post['email'].'?Subject=Contact%20site%20Gaumart" target="_top">'.$post['email'].'</a>';?>
            </div>
            <div class="column">
                <?php echo $post['msg'];?>
            </div>
            <div class="column">
                <form class="del" method="post" action="del_msg.php?id=<?php echo $post['id'];?>">
                    <input type="submit" name="suppr" value="Supprimer">
                </form>
            </div>
        </div>
        <?php
            }
        ?>

    
<?php
}else{
    header('location: login.php');
    }
?>        
    </body>
</html>