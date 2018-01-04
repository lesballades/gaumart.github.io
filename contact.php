<div id="mailto">
    <h3>GAUMART</h3>
    <p> Tél : 01 45 83 78 78 <br>
        Email : <a href="mailto:gaumart75@orange.fr?Subject=Contact%20site%20Gaumart" target="_top">gaumart75@orange.fr</a></p>
    <img src="assets/img/8a41c703f9e8fd0ececec4a3f35abc87.jpg" alt="photo nouriture">
</div>

<form method="post" onsubmit="veriForm()" action="#contact">
    <label for="nom"><input autofocus required type="text" name="nom" placeholder="nom*"></label>
    <label for="societe"><input required type="text" name="societe" placeholder="societe*"></label>
    <label for="email"><input required type="email" name="email" placeholder="email*"></label>
    <label for="tel"><input required type="tel" name="tel" placeholder="tel*"></label>
    <label for="msg"><textarea required name="msg" placeholder="message*"></textarea></label>
    <input type="submit" name="envoyer" value="envoyer">
</form>

<?php /*envoit des données saisie à la base de données*/
    if(isset($_POST['envoyer'])){
        insertBdd();
    }
?>