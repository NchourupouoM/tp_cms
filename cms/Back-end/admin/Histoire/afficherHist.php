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
        <title>HISTOIRE</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
      <h1>L'HISTOIRE DE LA COMMUNE</h1>
    <?php
        $recup_pub = $db->query("SELECT * FROM histoire");   
        while( $pub = $recup_pub->fetch()){
    ?>
    <div class = "pro" style="border: 1px solid black; margin-bottom: 10px">
            <h1><?= $pub['titre'];?></h1>
            <br>
            <p><?= $pub['contenu'];?></p>
            <br>
           <a href = "ModifierH.php?id_histoire=<?=$pub['id_histoire'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer</button>
           </a>
    </div>
    <?php
        }
    ?>
    <a href="ajouterHist.php">Ajouter une histoire</a>
  </body>
</html>