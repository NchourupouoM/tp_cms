<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: admin/index.php');
}
if(isset($_POST['Envoyer']) ){
    if(!empty($_POST['nom']) and !empty($_POST['description'])){
        $nom = htmlspecialchars($_POST['nom']);
        $description =  htmlspecialchars($_POST['description']);
        $insererSite = $db->prepare("INSERT INTO site_touristiques (nom_site, description_site ) values(?,?)");
        $insererSite->execute(array($nom ,$description));
        echo "le site a bien ete envoye";
    }else{
        echo "veuillez renseigner tout les champs";
    }

 
}
?>
    <style>
    body{
        background-color:#67BE4B;
    }
    div{
        width: 400px;
        margin: 0 auto;
        margin-top:10%;
        background-color: white;
    }
    input[type=text],input[type=password]{
        width:100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border:1px solid black;
        box-sizing: border-box;
        
    }
    input[type=submit]{
        background-color:#53af57;
        color:white;
        padding:14px 20px;
        margin:8px 0;
        border: none;
        cursor: pointer;
        width:100px;
    }
    p{
        color: black;
    }
  </style>

<!DOCTYPE html>
<html>
    <head>
        <title>admin</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
<div>
    <form action ="" method ="post">
        <p>NOM DU SITE: </p><br>
        <input type="text" name ="nom"></br>
        <p>DESCRIPTION DU SITE: </p><br>
        <textarea type="text" name ="description"></textarea><br>
        <input type="submit" name ="Envoyer">
    </form>
</div>
  </body>
</html>