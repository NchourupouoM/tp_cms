<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: ./admin/index.php');

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
<?php
  $recup_person =$db->query("SELECT *FROM personnel");
  while($personnel =$recup_person->fetch()){
?>
     <p><?=$personnel['nom']; ?>   <?=$personnel['parcours']?>  <?=$personnel['poste']?><a href="supprimerPers.php?id_personnel=<?=$personnel['id_personnel'];?>"  style="color:red;text-decoration:none;">Supprimer</a></p>
     <a href = "modifierPersonnel.php?id_personnel=<?=$personnel['id_personnel'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer ce personnel</button>
      </a>
 <?php
  }
 ?>
  <a  style = "color: black; background-color: blue; margin-bottom:20px;" href="AjouterPersonnel.php">Ajouter un personnel</a>
  
  </body>
</html>