<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: formAdmin.php');
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
    <head>
        <title>afficher toute les sites touristique </title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
      <h1>LISTE DES SITES TOURISTIQUES</h1>
    <?php
        $recup_pub = $db->query("SELECT * FROM site_touristiques");   
        while( $pub = $recup_pub->fetch()){
    ?>
    <div class = "pro" style="border: 1px solid black; margin-bottom: 10px">
            <h1><?= $pub['nom_site'];?></h1>
            <br>
            <p><?= $pub['description_site'];?></p>
            <br>
            <p><?= $pub['photo'];?><br>
           <a href = "modifierLieuT.php?id_site=<?=$pub['id_site'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer</button>
           </a>
    </div>
    <?php
        }
    ?>
    <a href="ajouterLieuT.php">Ajouter un site</a>
  </body>
</html>