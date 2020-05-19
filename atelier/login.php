<?php include("inc/header.inc.php"); ?>

<?php

session_start();
if (isset($_POST['connexion'])){
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  if(!empty($username) AND !empty($password)){
    $requeteSQL = $pdo->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = ? AND mot_de_passe = ?");
    $requeteSQL->execute(array($username, $password));
    $userexist = $requeteSQL->rowCount();
    if($userexist == 1 ){
        $userinfo = $requeteSQL->fetch();
        $_SESSION['id'] = $userinfo['id_utilisateur'];
        $_SESSION['nom_utilisateur'] = $userinfo->nom_utilisateur;
        $_SESSION['mot_de_passe'] = $userinfo->mot_de_passe;
        header("Location: admin.php?id=".$_SESSION['id']);
    }
    else {
        $message = 'mauvais identifiant ou mot de passe.';
    }
  }
  else {
       $message = 'Tous les champs doivent être complétés. ';
  }
 
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="connexion" class="box-button">
<?php if (! empty($message)) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>
</form>
</body>

<?php include("inc/footer.inc.php"); ?>    