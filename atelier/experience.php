<?php include("inc/header.inc.php"); ?>


<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" >
      <div class="w-100">
        <h2 class="mb-5">Experience</h2>

    <?php
        
        $result = $pdo->query("SELECT * FROM experiencePro  ORDER BY date DESC ");
        while ($experience = $result->fetch(PDO::FETCH_OBJ)) { ?>


            <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
                <h3 class="mb-0"><?php echo $experience->metier; ?></h3>
                <div class="subheading mb-3"><?php echo $experience->entreprise; ?></div>
                <p><?php echo $experience->description; ?></p>
            </div>
            <div class="resume-date text-md-right">
                <span class="text-primary"><?php echo $experience->date; ?></span>
            </div>
            </div>

        <?php } ?>

                

        

      </div>

    </section>

<?php include("inc/footer.inc.php"); ?>