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
        <title>LISTE DES ANNONCES </title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
      <h1>LISTE DES ANNONCES </h1>
    <?php
        $recup_pro = $db->query("SELECT * FROM annonces");   
        while( $pro = $recup_pro->fetch()){
    ?>
    <div class = "pro" style="margin-bottom: 10px"  enctype ="multipart/form-data">
            <h1><?= $pro['titre_annonce'];?></h1>
            <br>
            <p><?= $pro['Description_annonce'];?></p>
            <br>
            <!--<p><?= $pro['photo'];?><br>-->
           <a href = "modifier.php?id_annonce=<?=$pro['id_annonce'];?>">
            <button style = "color: black; background-color: blue; padding-bottom:10px;">Editer cette annonce</button>
           </a>
    </div>
    <?php
        }
    ?>
    <a  style = "color: black; background-color: blue; margin-bottom:20px;" href="ajouter.php">Ajouter une annonce</a>

  </body>
</html>