<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: ./admin/index.php');
}
if(isset($_POST['Envoyer']) ){
    if(!empty($_POST['nom']) and !empty($_POST['description'])){

        /*$photoName = $_FILES['photo']['name'];
        $destination_photo ="images/".$photoName;
        $extensions_valide = array(".jpg",".png",".gif");
        if(in_array(strrchr($photoName, ".") , $extensions_valide)){ 
            if(move_uploaded_file($_FILES["photo"]["tmp_name"],$destination_photo))
                $inserPhoto = $db->prepare("INSERT INTO site_touristiques (photo) VALUE(?)");
                $inserPhoto->execute($destination_photo);
        }else{
            echo " l' extension de la photo n est bonne";
        }*/

        $nom = htmlspecialchars($_POST['nom']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $insererActivite = $db->prepare("INSERT INTO Activites (nom_activite , description_activite ) values(?,?)");
        $insererActivite->execute(array($nom ,$description));
        echo "L'activite a bien ete envoye";
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
    <form action ="" method ="post" enctype ="multipart/form-data">
        <p>NOM DE L'ACTIVITE: </p><br>
        <input type="text" name ="nom"></br>
        <P>DESCRIPTION DE L'ACTIVITE:</p>
        <textarea type="text" name ="description">

        </textarea>      
        <!-- <p>PHOTO DE L'ACTIVITE: </p><br>
         <input type ="file" name ="photo" value ="upload image">-->
        <br><input type="submit" name ="Envoyer">
    </form>
</div>
  </body>
</html>