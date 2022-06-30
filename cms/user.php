<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
if(isset($_POST['valider'])){
$login = $_POST['login'];
$pass = $_POST['pass'];
$site = $_POST['site'];
$insererSite = $db->prepare("INSERT INTO User (login, password ,site ) values(?,?,?)");
$insererSite->execute(array($login ,$pass ,$site));
$getid = $db->lastInsertId();

}
mkdir('repertoire'.$getid , 0777 , true) ;
$fichiers = ['Activite.php','Annonce.php','EspacePub.php','footer.php','header.php','Histoire.php','logo.jpeg','missions.php','Personnel.php','presentation.php','projet.php','Tourisme.php' ];
foreach($fichiers as $fiche){
    copy('Front-End/'.$fiche,'repertoire.getid/'.$fiche);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
</head>
<body>
    <form action ="user.php" method ="post">
        <p>LOGIN: </p><br>
        <input type="text" name ="login"></br>
        <p>password: </p><br>
        <input type="password" name ="pass"></br>
         <p>Nom du site</p>
         <input type="text" name ="site" ></br>
        <input type="submit" name ="valider">
    </form>
    </form>
</body>
</html>