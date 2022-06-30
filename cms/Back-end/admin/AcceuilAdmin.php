<?php
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: formAdmin.php');
}
?>
<?php  include "header.php" ?>
<style>
 .gestion {
   margin-left:200px;
   margin-right: 200px;
  justify-content:center;
  margin-top:60px;
  background-color:pink;

 }
  a{
     display:inline;
     text-decoration:none;
     justify-content:center;
 }
 h1{
     margin-left:300px;
     color: red;
     font-size:40px;
 }
 p{
    font-size: 30px;
 }
</style>
    <h1>BIENVENU SUR LA PAGE ADMIN</h1>
<div class="gestion">
    <p>Vous vous etes connectez en tant qu'administrateur . Vous pouvez utiliser les onglets ci-dessus
        pour gerer votre site web.
    </p>
<p>Cliquer<a href="user.php">ici</a>pour generer votre site apres modification</p>
</div>
