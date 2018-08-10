<!DOCTYPE html>
<html lang="fr" class="no-js">
<?php include 'head.php'; ?>
    <?php include 'connect.php'; ?>
        <?php include 'header.php'; ?>  
        <?php 
        $id = $_GET["id"];
        $nom = $_GET["nom"]; 
?>
   
              <section class="global-page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2>Modifier une Image</h2>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.php"> <i class="ion-ios-home"></i> Accueil </a>
                                    </li>
                                    <li class="active">Modifier l'image de: <?php echo ucwords($nom);?></li>
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
                                    <form id="contact-form" role="form" method="post" action="updateImg.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" value="<?php echo ucwords($nom) ?>" class="form-control" name="nomFiche" id="nomFiche" readonly> </div>
                                   <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                                                <label>
                                                    <input  class="btn btn-default btn-send" id="upimg" name="upimg" type="file">Joindre une image | max 1Mo
                                                 </label>
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