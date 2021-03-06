<!DOCTYPE html>
<html lang="fr">
<?php include 'head.php'; ?>
<?php include 'connect.php'; ?>
<?php include 'header.php'; ?>
 <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>Recettes pour la Maison</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Accueil
                                    </a>
                                </li>
                                <li class="active">Recettes pour la Maison</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php //Récupération de la base de données
    $requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
    $requete->bindParam(':nomCat', $cat);
    $cat = "recette ménagère";
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
        $idCat= $row->idCat;
    }   
?>
  <?php
            $requete = "SELECT * FROM fiche 
             WHERE catFiche = ".$idCat;
            $resultat = $connexion->query($requete);
            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
    ?>
   <section class="aftertitle">
    <div class="container">
        <div class="row">
           <?php include 'list-image-display.php' ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>