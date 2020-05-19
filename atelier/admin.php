<?php include("inc/header.inc.php"); ?>

    <?php
    
    session_start();
 
    if(isset($_SESSION["id"])){
       
    

    
   
    if (!empty($_POST)) {
    
        $_POST["metier"] = htmlentities($_POST["metier"], ENT_QUOTES);
        $_POST["entreprise"] = htmlentities($_POST["entreprise"], ENT_QUOTES);
        $_POST["date"] = htmlentities($_POST["date"], ENT_QUOTES);
        $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);

        $requeteSQL = "INSERT INTO experiencePro (metier, entreprise, date, description)";
        $requeteSQL .= " VALUE ('$_POST[metier]', '$_POST[entreprise]', '$_POST[date]', '$_POST[description]')";
      
        $result = $pdo->exec($requeteSQL);
        echo $result . ' Experience Pro a été enregistrée<br>';
        
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


            <button type="submit" class="btn btn-primary">Enregistrer</button>

        </form> 

        <br> 
        <br>  

        <?php
        
        $result = $pdo->query("SELECT * FROM experiencePro  ORDER BY date DESC ");
        while ($experience = $result->fetch(PDO::FETCH_OBJ)) { ?>


            <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="resume-content">
                    <h3 class="mb-0" name="metier1"><?php echo $experience->metier; ?></h3>
                    <div class="subheading mb-3"><?php echo $experience->entreprise; ?></div>
                    <a href="modification.php?id=<?php echo $experience->id_experience; ?>" class="btn btn-primary">Modifier ou Supprimer </a>
                    
                </div>
            </div>

         

        <?php } 
        
    } 
    else {
        header("Location: login.php");
    }
        ?>




   


        


<?php include("inc/footer.inc.php"); ?>