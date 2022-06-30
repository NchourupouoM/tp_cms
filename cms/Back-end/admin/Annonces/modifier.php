<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");

if($_GET['id_annonce'] and !empty($_GET['id_annonce'])){
    $getid = $_GET['id_annonce'];
    $recup_an = $db->prepare("SELECT * FROM annonces WHERE id_annonce=?");
    $recup_an->execute(array($getid));
    if($recup_an->rowCount() > 0){
        $info_an = $recup_an->fetch();
        $titre = $info_an['titre_annonce'];
        $description = $info_an['Description_annonce'];
        //$photo = $info_pub['photo'];
        if(isset($_POST['valider'])){ 
            $titre_saisi = htmlspecialchars($_POST['titre']);
            //$photo_choisi = $_POST['photo'];
            $description_saisi =nl2br(htmlspecialchars($_POST['description']));

            $update_pub = $db->prepare("UPDATE annonces SET titre_annonce = ? ,description_annonce = ? WHERE id_annonce =?");
            $update_pub ->execute(array($titre_saisi,$description_saisi,$getid));
            header("Location: affichage.php");
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
        <title>modifier le publication</title>
        <meta charset="utf-8">
    </head>
  <body>
    <div>
    <form action ="" method ="post" enctype ="multipart/form-data">
        <p>TITRE DE L'ARTICLE: </p><br>
        <input type="text" name ="titre" value ="<?= $titre ;?>"></br>
        <p>DESCRIPTION DE L'ARTICLE A PUBLIER: </p><br>
        <textarea type="text" name ="description">
                <?= $description ;?>
        </textarea><br>
        <input type="submit" name ="valider">
    </div>
    </form>
  </body>
</html>