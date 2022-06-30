<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location:  ./admin/index.php');
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
        margin-left:300px;

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
        <title>LISTE DES NOS PROJETS </title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
      <h1>LISTE DES PROJETS EN COURS ET DEJA REALISES</h1>
    <?php
        $recup_pro = $db->query("SELECT * FROM projets");   
        while( $pro = $recup_pro->fetch()){
    ?>
    <div class = "pro" style="margin-bottom: 10px">
            <h1><?= $pro['nom_projet'];?></h1>
            <br>
            <p><?= $pro['etat_projet'];?></p>
            <br>
            <p><?= $pro['description_projet'];?><br>
           <a href = "EditerPro.php?id_projet=<?=$pro['id_projet'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer ce projet</button>
           </a>
    </div>
    <?php
        }
    ?>
        <a  style = "color: black; background-color: blue; margin-bottom:20px;" href="ajouterpro.php">Ajouter un projet</a>

  </body>
</html>