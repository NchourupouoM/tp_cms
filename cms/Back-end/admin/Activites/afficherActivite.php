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
    <head>
        <title>LISTE DES ACTIVITES </title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
      <h1>LISTE DES ACTIVITES </h1>
    <?php
        $recup_pro = $db->query("SELECT * FROM Activites");   
        while( $pro = $recup_pro->fetch()){
    ?>
    <div class = "pro" style="margin-bottom: 10px"  enctype ="multipart/form-data">
            <h1><?= $pro['nom_activite'];?></h1>
            <br>
            <p><?= $pro['description_activite'];?></p>
            <br>
            <!--<p><?= $pro['photo'];?><br>-->
           <a href = "EditerActivite.php?id_activite=<?=$pro['id_activite'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer cette activite</button>
           </a>
    </div>
    <?php
        }
    ?>
    <a  style = "color: black; background-color: blue; margin-bottom:20px;" href="ajouterActivite.php">Ajouter une activites</a>

  </body>
</html>