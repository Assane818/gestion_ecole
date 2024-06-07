<?php if($_SESSION['userConnect']['role'] == "ROLE_ETUDIANT"):?>
    <div class="header">
        <?php if(isset($_GET["action"])):?>
            <?php if($_GET["action"] == "add"):?>
                <h1 class="titre">Nouveau</h1>
            <?php elseif($_GET["action"] == "details"):?>
                <h1 class="titre">Details</h1>
            <?php else:?>
                <h1 class="titre">Demandes</h1>
            <?php endif;?>
        <?php endif;?>
        <div class ="pp"><img src="<?=WEBROOT?>/img/pngtree-avatar-of-a-brunette-man-png-image_10214147.png" alt=""></div>
        <p class="user"><?=$_SESSION['userConnect']['nom']?><br><?=$_SESSION['userConnect']['prenom']?></p>
    </div>
    <div class="logout">
        <a href="<?=WEBROOT?>?action=logout"><h4><i class='bx bx-arrow-back'></i>Deconnexion</h4></a>
        </div>
    <div class="entete">
        <h1><i class='bx bxs-graduation'></i>classe:</h1>
        <p><?=$_SESSION['userConnect']['libele']?></p>
        <h1><i class='bx bxs-calendar'></i>annee scolaire:</h1>
        <p><?=$_SESSION['anneeEncours']['nom']?></p>
    </div>
<?php endif?>
<?php if($_SESSION['userConnect']['role'] == "ROLE_AC"):?>
    <div class="header">
        <?php if(isset($_GET["action"])):?>
            <?php if($_GET["action"] == "add"):?>
                <h1 class="titre">Nouveau</h1>
            <?php elseif($_GET["action"] == "details"):?>
                <h1 class="titre">Details</h1>
            <?php else:?>
                <h1 class="titre">Demandes</h1>
            <?php endif;?>
        <?php endif;?>
        <div class ="pp"><img src="<?=WEBROOT?>/img/pngtree-avatar-of-a-brunette-man-png-image_10214147.png" alt=""></div>
        <p class="user"><?=$_SESSION['userConnect']['nom']?><br><?=$_SESSION['userConnect']['prenom']?></p>
        </div>
        <div class="logout">
        <a href="<?=WEBROOT?>?action=logout"><h4><i class='bx bx-arrow-back'></i>Deconnexion</h4></a>
        </div>
        <div class="entete">
        <h1><i class='bx bxs-calendar'></i>annee scolaire:</h1>
        <p><?=$_SESSION['anneeEncours']['nom']?></p>
    </div>
<?php endif?>

<?php if($_SESSION['userConnect']['role'] == "ROLE_RP"):?>
    <div class="header">
        <?php if(isset($_GET["action"])):?>
            <?php if($_GET["action"] == "liste-prof"):?>
                <h1 class="titre">Professeurs</h1>
            <?php elseif($_GET["action"] == "add-prof"):?>
                <h1 class="titre">Professeurs</h1>
                <?php elseif($_GET["action"] == "affecter-classe"):?>
                <h1 class="titre">Classe</h1>
                <?php elseif($_GET["action"] == "affecter-module"):?>
                <h1 class="titre">Module</h1>
                <?php elseif($_GET["action"] == "liste-classe-prof"):?>
                <h1 class="titre">Professeurs</h1>
            <?php else:?>
                <h1 class="titre">Classes</h1>
            <?php endif;?>
        <?php endif;?>
        <a href="<?=WEBROOT?>?action=liste-classe"><p class="class">liste des classes</p></a>
        <a href="<?=WEBROOT?>?action=liste-prof"><p class="prof">liste des profeseurs</p></a>
        <div class ="pp"><img src="<?=WEBROOT?>/img/pngtree-avatar-of-a-brunette-man-png-image_10214147.png" alt=""></div>
        <p class="user"><?=$_SESSION['userConnect']['nom']?><br><?=$_SESSION['userConnect']['prenom']?></p>
        </div>
        <div class="logout">
        <a href="<?=WEBROOT?>?action=logout"><h4><i class='bx bx-arrow-back'></i>Deconnexion</h4></a>
        </div>
        <div class="entete">
        <h1><i class='bx bxs-calendar'></i>annee scolaire:</h1>
        <p><?=$_SESSION['anneeEncours']['nom']?></p>
    </div>
<?php endif?>