

    </div>
    <div class="profil">
        <img src="<?=WEBROOT?>/img/pngtree-avatar-of-a-brunette-man-png-image_10214147.png" alt="">
        <p class="user1"><?=$demande['nom']?> <?=$demande['prenom']?></p>
        <h5><?=$demande['libele']?></h5>
    </div>
    <div class="cara">
        <p>Annee: <span><?=$_SESSION['anneeEncours']['nom']?></span></p>
        <p>Type: <span><?=$demande['type']?></span></p>
        <p>Date: <span><?=$demande['date']?></span></p>
    </div>
    <div class="champs">
        <h1>Motif</h1>
        <div>
            <p><?=$demande['Motif']?></p>
        </div>
    </div>
    <?php if($_SESSION['userConnect']['role'] == "ROLE_AC" && $demande['Etat'] == "Encours"):?>
        <div class="send1">
            <button>Annuler</button>
            <button>Valider</button>
        </div>
    <?endif;?>
