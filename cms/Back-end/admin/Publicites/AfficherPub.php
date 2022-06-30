<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: ./admin/index.php');
}

?>
<style>
    body{
        background-color:#67BE4B;
  }
    .pro{
        margin-left:140px;
        margin-right:100px;
        background-color: white;
    }
    .pro p{
        font-size:30px;
        border: 2px ;
        border-color:black;
    }
    .pro h1{
        margin-left:200px;
        text-transform:uppercase;
    }
    
    body h1{
        margin-left:400px;

    }
    body a{
        text-decoration: none;
        color:black;
        font-size:40px;
    }
</style>


<!DOCTYPE html>
<html>
    <a href="AjouterPub.php">Ajouter une pub</a>
    <head>
        <title>afficher toute les publicites </title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
      <h1>LISTE DES PUBLICITES</h1>
    <?php
        $recup_pub = $db->query("SELECT * FROM publicites");   
        while( $pub = $recup_pub->fetch()){
    ?>
    <div class = "pro" style="border: 1px solid black; margin-bottom: 10px">
            <h1><?= $pub['titre_pub'];?></h1>
            <br>
            <p><?= $pub['description'];?></p>
            <br>
            <!--<p><image src ="admin/image/<?= $pub['photo'];?>"><br>-->
            <a href = "supprimerPub.php?id_pub=<?=$pub['id_pub'];?>">
            <button style = "color: white; background-color: red; padding-bottom:10px;">supprimer cette publication</button>
           </a>
           <a href = "EditerPub.php?id_pub=<?=$pub['id_pub'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer cette publication</button>
           </a>
    </div>
    <?php
        }
    ?>
  </body>
</html>