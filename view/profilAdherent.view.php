<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../view/src/style/profilAdherent.css">
    <link rel="icon" href="../view/src/img/logo.png" />
    <meta charset="utf-8">
    <title>Votre profil</title>
  </head>
  <body>
    <?php

    $mail= $profil->getMail();
    $adresse= $profil->getAdresse();
    $statut = $profil->getStatut();
    $nom= $profil->getNom();
    $prenom=$profil->getPrenom();
    $dateNaiss= $profil->getDateNaiss();
    $tel = $profil->getTel();
    $codePostal = $profil->getCodePostal();
    $ville = $profil->getVille();
    $listCours = $dao->getCours($mail);
    $statue = $profil->getStatut();
     ?>
     <header>
       <nav class="navbar navbar-expand-lg bg-white">
         <a class="navbar-brand" href="#">
           <img class="logo" src="../view/src/img/logo.png" alt="logo-InTheBoxe">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon">Menu</span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item">
               <a class="nav-link active" href="../controle/accueil.ctrl.php">Accueil<span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="../controle/actualite.ctrl.php">Actualités</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="../controle/planning.ctrl.php">Planning/Tarifs</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="../controle/club.ctrl.php">Club</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="../controle/contact.ctrl.php">Contact</a>
             </li>
           </ul>
           <ul class="navbar-nav my-2 my-lg-0">
             <?php if (isset($_SESSION['mail'])) {
                 $nom = $_SESSION['prenom']; ?>
                 <li class="nav-item dropdown bg-red">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?=$nom?>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="../controle/profil.ctrl.php">Profil</a>
                     <a class="dropdown-item" href="../controle/accueil.ctrl.php?deco=1">Déconnexion</a>
                     <div class="dropdown-divider"></div>
                   </div>
                 </li>
             <?php }else { ?>

               <li class="nav-item my-2 my-sm-0 bg-red">
                 <a class="nav-link" href="../controle/connexion.ctrl.php">Connexion</a>
               </li>
             <?php } ?>
           </ul>
         </div>
       </nav>
     </header>

  <div class="container d-flex justify-content-around">
    <div class="user-details">
            <div class="user-image text-center">
                <img src="../view/src/img/profil/connexion_logo.png" alt="Mon nom" title="Mon nom" class="img-thumbnail">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3><?= $prenom ?> <?= $nom ?></h3>
                    <span class="help-block"><?= $mail ?></span>
                    <hr class="style1">
                </div>
                <?php if ($statue=='attente') :?>
                  <p style='color:red' >Votre profile est en attente il faut vous rendre au club pour validé votre inscription.</p>
                   <p style='color:red' > Conditions et documents requis:</p>
                  <ul>
                    <li style='color:red' >Paiment des frais d'inscriptions</li>
                    <li style='color:red'>Certificat medical</li>
                    <li style='color:red'>Carte d'identité</li>
                  </ul>
                <?php else :?>
                <div class="user-body">
                    <div class="tab-content">
                        <div id="information" class="tab-pane active">
                            <h4>Informations</h4>
                            <ul>
                              <li>Poids (en kg): <?=$profil->getPoids()?> </li>
                              <li>Taille : <?=$profil->getTaille()?></li>
                              <li>Licence : <?=$profil->getLicence()?></li>
                              <li>Catégorie : <?=$profil->getCategorie()?></li>

                              <li>Victoires : <?=$profil->getVictoire()?></li>
                              <li>Défaites : <?=$profil->getDefaite()?> </li>
                              <li>Matchs Nul : <?=$profil->getNul()?></li>
                            </ul>
                            <hr class="style1">
                        </div>

                        <div id="email" class="tab-pane active">
                          <?php if ($message): ?>
                            <h4 style="color:grey">Envoyer une demande de combat</h4>
                            <p style="color:green">Votre demande viens d'être envoyé ! le Coach vous enverra un mail pour vous faire part de sa décision</p>
                          <?php elseif($demande):?>
                            <h4 style="color:grey">Envoyer une demande de combat</h4>
                            <p style="color:grey">Vous avez une demande en cours </p>

                          <?php else:?>
                            <h4><a href="../controle/profil.ctrl.php?demande=1">Envoyer une demande de combat </a></h4>

                          <?php endif; ?>
                            <hr class="style1">
                        </div>

                        <section class="bouton">
                          <a href="../controle/timer.ctrl.php">
                            <span class="text">Je m'entraine</span>
                            <span class="line -right"></span>
                            <span class="line -top"></span>
                            <span class="line -left"></span>
                            <span class="line -bottom"></span>
                          </a>
                        </section>

                        <a id="apk" href="../appAndroid/InTheBoxe_1_1.0.apk" download="InTheBoxe_1_1.0.apk">Téléchargez l'application d'entrainement sur votre smartphone Android</a>

                        <hr class="style1">

                        <div id="cours" class="tab-pane active">
                            <h4>Cours inscrit</h4>
                            <br>
                            <?php if (count($listCours)>0) {
                                    foreach ($listCours as $cours) { ?>
                                      <h6> <?= $cours->getType() ?></h6>
                                      <p>  <?= $cours->getHoraireDebut() ?> - <?= $cours->getHoraireFin() ?> le <?= $cours->getJour() ?></p>
                                      <br>
                                    <?php }
                                  } else { ?>
                                    <p>  Vous n'êtes inscrit a aucun cours </p>

                                  <?php } ?>
                            <hr class="style1">
                        </div>
                      <?php  endif;?>
                        <div id="settings" class="tab-pane active">
                          <h4>Modifier les informations personnelles</h4>
                          <form class="parametrage" action="../controle/parametrage.ctrl.php" method="post">
                            <fieldset>
                              <p>
                                <label for="prenom"><h6>Prénom</h6></label>
                                <input type="text" name="prenom" id="prenom" autofocus placeholder="Prénom" value="<?=$prenom ?>" required/>
                              </p>
                              <p>
                                <label for="nom"><h6>Nom</h6></label>
                                <input type="text" name="nom" id="nom" required placeholder="Nom" value="<?=$nom ?>" required/>
                              </p>

                              <p>
                                <label for="tel"><h6>Téléphone</h6></label>
                                <input type="tel" name="tel" id="tel" placeholder="Téléphone" value="<?=$tel ?>"/>
                              </p>

                              <p>
                                <label for="adresse"><h6>Adresse</h6></label>
                                <input type="text" name="adresse" id="adresse" required placeholder="Adresse" value="<?=$adresse ?>" required/>
                              </p>
                              <p>
                                <label for="ville"><h6>Ville</h6></label>
                                <input type="text" name="ville" id="ville" required placeholder="Ville" value="<?=$ville ?>" required/>
                              </p>
                              <p>
                                <label for="cp"><h6>Code postal</h6></label>
                                <input type="number" name="codePostal" id="codePostal" required placeholder="Code postal" value="<?=$codePostal ?>" required/>
                              </p>
                              <input type="submit" value="Valider">
                            </fieldset>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small cyan darken-3">
    <!-- Footer Elements -->
    <div style="text-align:center;" class="container">
      <a href="https://www.start-securite.fr/">
        <!-- <img id="sponsor" src="../view/src/img/sponsor.png" alt="sponsor"> -->
      </a>
    </div>
    <!-- Footer Elements -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">Copyright BOXING CLUB EVIAN © 2020 |
      <a href="../RGPD/mentionsLegals.html"> Mentions Légales</a>
      |
      <a href="../RGPD/politiqueDeConfidentialite.html"> Politique de Confidentialité</a>
      |
      <a href="#">Site web crée par la WaliTeam</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


  </body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
