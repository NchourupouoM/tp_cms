<?php
   session_start();
  if(isset($_POST['sauvegarder'])){
    if(!empty($_POST['pseudo']) and !empty($_POST['mdp'])){
        $pseudo_par_defaut = "Admin";
        $mdp = "123";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);
        if($pseudo_par_defaut == $pseudo_saisi and $mdp == $mdp_saisi){
          $_SESSION['mdp'] = $mdp_saisi;
          header('Location: AcceuilAdmin.php');
        }else{
            echo " pseudo ou mot passe incorrect";
        }
   }else{
     echo"veuillez completer tout les champs";
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
  <div class="div-form">
    <form action ="" method ="post">
        <p>VOTRE NOM: </p>
        <input style ="color: red ; font-size:20px" type="text" name ="pseudo" autocomplete = "off" ></br><br>
        <P>VOTRE MOT DE PASSE:</P>
        <input style ="color: red; font-size:20px" type="password" name ="mdp"></br><br>
        <input type="submit" name ="sauvegarder">
    </form>
  </div>
  </body>
</html>