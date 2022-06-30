<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");

if($_GET['id_site'] and !empty($_GET['id_site'])){
    $getid = $_GET['id_site'];
    $recup_site = $db->prepare("SELECT * FROM site_touristiques WHERE id_site=?");
    $recup_site->execute(array($getid));
    if($recup_site->rowCount() > 0){
        $info_site = $recup_site->fetch();
        $nom = $info_site['nom'];
        $description = $info_site['description'];
        if(isset($_POST['valider'])){ 
            $nom_saisi = htmlspecialchars($_POST['nom']);
            $description_saisi =nl2br(htmlspecialchars($_POST['description']));

            $update_site = $db->prepare("UPDATE site_touristiques SET nom_site = ? ,description_site = ? WHERE id_site =?");
            $update_site ->execute(array($nom_saisi,$description_saisi,$getid));
            header("Location: afficherLieuT.php");
        }
    }else{
        echo "publication non trouvee";
    }
}else{
    echo "Aucune publication trouve";
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
        <title>MODIFICATION DU PROJET</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
    <div>
    <form action ="" method ="post">
        <p>NOM DU PROJET: </p><br>
        <input type="text" name ="nom" value ="<?= $nom ;?>"></br>
        <p>DESCRIPTION DU PROJET: </p><br>
        <textarea type="text" name ="description">
                <?= $description ;?>
        </textarea><br>
        <input type="submit" name ="valider">
    </form>
  </div>
  </body>
</html>