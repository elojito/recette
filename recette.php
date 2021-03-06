<!DOCTYPE html>
<html lang="fr">
<?php include 'head.php'; ?>
    <?php include 'connect.php'; ?>
        <?php include 'header.php'; ?>
            <?php
    $id = $_GET["id"];
    $nom = $_GET["nom"]; 
    $idcat= $_GET["cat"]; 
?>
                <section class="global-page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="block">
                                    <h2>Recette: <?php echo ucwords($nom);?></h2>
                                    <ol class="breadcrumb">
                                        <li>
                                            <a href="index.php"> <i class="ion-ios-home"></i> Accueil </a>
                                        </li>
                                        <li class="active">Recette:
                                            <?php echo ucwords($nom);?>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="recette-description">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $requete = "SELECT * FROM fiche WHERE idFiche = ".$id;
                                $resultat = $connexion->query($requete);
                                $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($liste as $element) {
                                       $imageFiche = $element->imageFiche;
                                    }
                                if(!$imageFiche){
                                    echo "<img src='images/fiche-no-image.jpg' class='img-responsive' alt='' >";
                                    $imgNom = "no-image.jpg";
                                }
                                else{
                                    $requete = "SELECT nom FROM image 
                                    INNER JOIN fiche ON image.idImage = fiche.imageFiche";
                                    $resultat = $connexion->query($requete);
                                    $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($liste as $element) {
                                        $imgNom = $element->nom;
                                    }
                                    echo "<img src='ups/".$imgNom."' class='img-responsive' alt='' >";
                                }
                                ?>
                                    <div>
                                        <?php echo  "<a href='editImg.php?nom=$nom&id=$id&cat=$idcat&img=$imgNom'>"; ?>
                                            <input type='submit' class='btn btn-default btn-send' value='Editer Image'>
                                            
                                        <?php echo "</a>"; ?>
                                        <?php echo  "<a href='deleteImg.php?nom=$nom&id=$id&cat=$idcat&img=$imgNom'>"; ?>
                                            <input type='submit' class='btn btn-default btn-send' value='Supprimer Image'>
                                            
                                        <?php echo "</a>"; ?>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="block">
                                    <h3 class="subtitle">Ingrédients</h3>
                                    <p>
                                        <?php
                            $requete= "SELECT ing FROM fiche WHERE idFiche = $id";
                            $resultat = $connexion->query($requete);
                            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                            foreach ($liste as $element){
                            echo trim($element->ing);
        }?>
                                    </p>
                                    <h3>Mode Opératoire</h3>
                                    <p>
                                        <?php 
                            $requete= "SELECT modop FROM fiche WHERE idFiche = $id";
                            $resultat = $connexion->query($requete);
                            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                            foreach ($liste as $element){
                            echo trim($element->modop);
        }
                        
    ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                        <?php echo  "<a href='editForm.php?nom=$nom&id=$id&cat=$idcat'>"; ?>
                                            <input type='submit' class='btn btn-default btn-send' value='Editer'>
                                            <?php echo "</a>"; ?>
                                        <?php echo  "<a href='deleteRecipe.php?nom=$nom&id=$id&cat=$idcat'>"; ?>
                                            <input type='submit' class='btn btn-default btn-send' value='Supprimer'>
                                            <?php echo "</a>"; ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
                <?php include 'footer.php'; ?>