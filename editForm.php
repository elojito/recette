<!DOCTYPE html>
<html lang="fr" class="no-js">
<?php include 'head.php'; ?>
    <?php include 'connect.php'; ?>
        <?php include 'header.php'; ?>  
        <?php 
        $id = $_GET["id"];
        $nom = $_GET["nom"]; 
        $idcat = $_GET["cat"]; 
?>
   
              <section class="global-page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2>Modifier une Recette</h2>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.php"> <i class="ion-ios-home"></i> Accueil </a>
                                    </li>
                                    <li class="active">Modifier: <?php echo ucwords($nom);?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-------------------------------------------------------------------->
            <section id="form-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="block">
                                <div class="contact-form" style="margin-top:-4em;">
                                    <form id="contact-form" role="form" method="post" action="edit.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" value="<?php echo ucwords($nom) ?>" class="form-control" name="nomFiche" id="nomFiche" readonly> </div>
                                        <div class="form-group">
                                            <select class="form-control" id="cat" name="cat">
                                               <?php 
                                                $requete = "SELECT nomCat FROM category WHERE idCat = $idcat";
                                                $resultat = $connexion->query($requete);
                                                $liste = $resultat->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($liste as $element){
                                                    $nom = $element["nomCat"];
                                                }
                                                ?>
                                                <option> Catégorie </option>
                                                <?php
                                                $requete  = "SELECT * FROM category";
                                                $resultat = $connexion->query($requete);
                                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($liste as $element) {
                                                    if($element["nomCat"] == $nom){echo "<option selected>";}
                                                    else{echo "<option>";}
                                                    echo $element["nomCat"];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                       <div class="form-group">
                                           <?php 
                                                    $requete= "SELECT descriptif FROM fiche WHERE idFiche = $id";
                                                    $resultat = $connexion->query($requete);
                                                    $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                                                    foreach ($liste as $element){
                                                        $descriptif = trim($element->descriptif);} 
                                           ?>                                           
                                            <input class="form-control" id="descriptif" name="descriptif" value="<?php echo $descriptif; ?>" /> </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <textarea class="form-control" id="ing" name="ing" placeholder="Ingrédients" rows="6">
                                                    <?php 
                                                    $requete= "SELECT ing FROM fiche WHERE idFiche = $id";
                                                    $resultat = $connexion->query($requete);
                                                    $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                                                    foreach ($liste as $element){
                                                        echo trim($element->ing);} ?>
                                                </textarea>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="form-group">
                                                <textarea class="form-control" id="modop" name="modop" placeholder="Mode Opératoire" rows="6">
                                                    <?php 
                                                    $requete= "SELECT modop FROM fiche WHERE idFiche = $id";
                                                    $resultat = $connexion->query($requete);
                                                    $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                                                    foreach ($liste as $element){
                                                        echo trim($element->modop);} ?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="submit">
                                                <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Envoyer"> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php' ?>