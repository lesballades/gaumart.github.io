<?php


//__Function envoit data form dans bdd:
function insertBdd(){
    
    //__Conect Data Base__PDO => co secu:
    //try verif présence erreur, si il y a, catch.
    try{
        $bdd=new PDO ('mysql:host=localhost;dbname=gaumart;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    
    //function control data
    function test_input($data) {
        $data = trim($data);//remove whitespace
        $data = stripslashes($data);//remove antislash
        $data = htmlspecialchars($data);//verif balise html failed
        return $data;
    }
    
    //verif input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = test_input($_POST["nom"]);
        $societe = test_input($_POST["societe"]);
        $tel = test_input($_POST["tel"]);
        $email = test_input($_POST["email"]);
        $msg = test_input($_POST["msg"]);
    }
    
    //envoit data to BDD:
    //--préparation & execution de la requête
    $req = $bdd->prepare('INSERT INTO contact(nom, societe, tel, email, msg, date) VALUES (:nom, :societe, :tel, :email, :msg, NOW())');
    $req -> execute(array(
    'nom' => $nom,
    'societe' => $societe,
    'tel' => $tel,
    'email' => $email,
    'msg' => $msg));
    
    /*
    $sql = 'INSERT INTO contact VALUES (NULL, "'.$nom.'","'.$societe.'","'.$tel.'","'.$email.'","'.$msg.'",NOW())';
    $bdd -> exec($sql);
    */
    
    /*__Lib. Obj requête__*/
    $req->closeCursor();
    
    /*__FERMETURE CO BDD__*/
    $bdd = null;

}

?>