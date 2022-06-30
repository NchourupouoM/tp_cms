<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location:  ./admin/index.php');
}
if(isset($_POST['Envoyer']) ){
    if(!empty($_POST['nom']) and !empty($_POST['description']) and !empty($_POST['etat_pro'])){
        $nom = htmlspecialchars($_POST['nom']);
        $etat =  htmlspecialchars($_POST['etat_pro']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $insererProjet = $db->prepare("INSERT INTO projets (nom_projet , description_projet,etat_projet ) values(?,?,?)");
        $insererProjet->execute(array($nom ,$description,$etat));
        echo "le projet a bien ete envoye";
    }else{
        echo "veuillez renseigner tout les champs";
    }

 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>admin</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
    <form action ="" method ="post">
        <p>NOM DU PROJET: </p><br>
        <input type="text" name ="nom"></br>
        <P>ETAT DU PROJET:</p>
        <input type="text" name ="etat_pro">
        <p>DESCRIPTION DU PROJET: </p><br>
        <textarea type="text" name ="description"></textarea><br>
        <input type="submit" name ="Envoyer">
    </form>
  </body>
</html>