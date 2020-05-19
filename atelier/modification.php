<?php include("inc/header.inc.php"); ?>

<?php
   
   if (!empty($_POST["modifier"])) {
   
       $_POST["metier"] = htmlentities($_POST["metier"], ENT_QUOTES);
       $_POST["entreprise"] = htmlentities($_POST["entreprise"], ENT_QUOTES);
       $_POST["date"] = htmlentities($_POST["date"], ENT_QUOTES);
       $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);

       $requeteSQL = "UPDATE experiencePro SET metier = '$_POST[metier]', entreprise='$_POST[entreprise]', date='$_POST[date]', description='$_POST[description]' WHERE id_experience = $_GET[id]";  
      
       $result = $pdo->exec($requeteSQL);
       echo $result . ' Experience Pro a été enregistrée<br>';
       header("Location: admin.php");

      
       
   }elseif (!empty($_POST["supprimer"])) {

    $pdo->exec("DELETE FROM experiencePro WHERE id_experience = $_GET[id] ");
    header("Location: admin.php");


 }
   ?>



       <form method="POST" action="" enctype='multipart/form-data'>

           <div class="form-group">
               <label for="metier">Nom du métier</label>
               <input type="texte" class="form-control" id="metier" name="metier">
           </div>

           <div class="form-group">
               <label for="entreprise">Nom de l'entreprise</label>
               <input type="texte" class="form-control" id="entreprise" name="entreprise">
           </div>

           <div class="form-group">
               <label for="date">Date (yyyy-mm-dd)</label>
               <input type="texte" class="form-control" id="date" name="date">
           </div>

           

           <div class="form-group">
               <label for="description">Description </label>
               <textarea rows="10" class="form-control" id="description" name="description"></textarea>
           </div>


           <form action="" method="post">
                        <input type="hidden" name="modifier" value="1" >
                        <input type="submit" value="Modifier" class="btn btn-primary ">
            </form> 

           

       </form> 

       <form action="" method="post">
                        <input type="hidden" name="supprimer" value="1" >
                        <input type="submit" value="Supprimer" class="btn btn-danger ">
            </form>   
 
 

<?php include("inc/footer.inc.php"); ?>