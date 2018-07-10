<!DOCTYPE html>
<html lang="fr" class="no-js">
<?php include 'head.php'; ?>
    <?php include 'connect.php'; ?>
        <?php include 'header.php'; ?>
            <section class="global-page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2>Ajouter une Recette</h2>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.php"> <i class="ion-ios-home"></i> Accueil </a>
                                    </li>
                                    <li class="active">Ajouter une Recette</li>
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
                                    <form id="contact-form" role="form" method="post" action="add.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" placeholder="Nom de la Recette" class="form-control" name="nomFiche" id="nomFiche"> </div>
                                        <div class="form-group">
                                            <select class="form-control" id="cat" name="cat">
                                                <option selected="selected"> Catégorie </option>
                                                <?php
                                                $requete  = "SELECT * FROM category";
                                                $resultat = $connexion->query($requete);
                                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($liste as $element) {
                                                    echo "<option>";
                                                    echo $element["nomCat"];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="descriptif" name="descriptif" placeholder="Descriptif" /> </div>
                                        <div class="form-group">
                                            <input id="ingr" name="ingr" class="form-control" placeholder="Ingrédient" />
                                            <input id="qu" name="qu" placeholder="Quantité" class="form-control" />
                                            <select class="form-control" id="mes" name="mes">
                                                <option selected="selected">mesure</option>
                                                <?php
                                                $requete  = "SELECT * FROM mesure";
                                                $resultat = $connexion->query($requete);
                                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($liste as $element) {
                                                    echo "<option>";
                                                    echo $element["nomMesure"];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                            <!--  <button type="button" value="Ajouter" onclick="addI();">Ajouter</button>-->
                                        </div>
                                        <div class="form-grou">
                                            <input id="ingr2" name="ingr2" class="form-control" placeholder="Ingrédient" />
                                            <input id="qu2" name="qu2" placeholder="Quantité" class="form-control" />
                                            <select class="form-control" id="mes2" name="mes2">
                                                <option selected="selected">mesure</option>
                                                <?php
                                $requete  = "SELECT * FROM mesure";
                                $resultat = $connexion->query($requete);
                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($liste as $element) {
                                echo "<option>";
                                echo $element["nomMesure"];
                                echo "</option>";
                                }
                                ?>
                                            </select>
                                            <!--  <button type="button" value="Ajouter" onclick="addI();">Ajouter</button>-->
                                        </div>
                                        <div class="form-group">
                                            <input id="ingr3" name="ingr3" class="form-control" placeholder="Ingrédient" />
                                            <input id="qu3" name="qu3" placeholder="Quantité" class="form-control" />
                                            <select class="form-control" id="mes3" name="mes3">
                                                <option selected="selected">mesure</option>
                                                <?php
                                $requete  = "SELECT * FROM mesure";
                                $resultat = $connexion->query($requete);
                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($liste as $element) {
                                echo "<option>";
                                echo $element["nomMesure"];
                                echo "</option>";
                                }
                                ?>
                                            </select>
                                            <!--  <button type="button" value="Ajouter" onclick="addI();">Ajouter</button>-->
                                        </div>
                                        <div class="form-group">
                                            <input id="ingr4" name="ingr4" class="form-control" placeholder="Ingrédient" />
                                            <input id="qu4" name="qu4" placeholder="Quantité" class="form-control" />
                                            <select class="form-control" id="mes4" name="mes4">
                                                <option selected="selected">mesure</option>
                                                <?php
                                $requete  = "SELECT * FROM mesure";
                                $resultat = $connexion->query($requete);
                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($liste as $element) {
                                echo "<option>";
                                echo $element["nomMesure"];
                                echo "</option>";
                                }
                                ?>
                                            </select>
                                            <!--  <button type="button" value="Ajouter" onclick="addI();">Ajouter</button>-->
                                        </div>
                                        <div class="form-group">
                                            <input id="ingr5" name="ingr5" class="form-control" placeholder="Ingrédient" />
                                            <input id="qu5" name="qu5" placeholder="Quantité" class="form-control" />
                                            <select class="form-control" id="mes5" name="mes5">
                                                <option selected="selected">mesure</option>
                                                <?php
                                $requete  = "SELECT * FROM mesure";
                                $resultat = $connexion->query($requete);
                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($liste as $element) {
                                echo "<option>";
                                echo $element["nomMesure"];
                                echo "</option>";
                                }
                                ?>
                                            </select>
                                            <!--  <button type="button" value="Ajouter" onclick="addI();">Ajouter</button>-->
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <textarea class="form-control" id="modop" name="modop" placeholder="Mode Opératoire" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <!-------------image----------->
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                                                <label>
                                                    <input  class="btn btn-default btn-send" id="upimg" name="upimg" type="file">Joindre une image | max 1Mo
                                                 </label>
                                            </div>
                                        </div>
                                        
                                        <!-----------/image------------>
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