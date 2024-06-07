    <div class="container1">
        <div action="" class="content">
            <h2>Affecter une classe a un professeur</h2>
            <form class="choix1" action="<?WEBROOT?>" method="post">
                <div class="name1">
                    <P>NOM: <span><?= $prof['nom']?></span></P>
                    <p>PRENOM: <span><?= $prof['prenom']?></span></p>
                    <p>GRADE: <span><?= $prof['grade']?></span></p>
                </div>
                <div class="check">
                    <h3>Classes:</h3>
                    <?php foreach($profClasses as $profClasse):?>
                        <input type="checkbox" name="classe[]" value="<?php echo $profClasse['libele'] ?>">
                        <label for=""><?php echo $profClasse['libele'] ?></label>
                    <?php endforeach;?>
                </div>
                <div class="send">
                    <button type="reset"><a href="<?=WEBROOT?>?action=liste-prof">Annuler</a></button>
                    <button type="submit" name="action" value ="form-affect-classe">Enregistrer</button>
                </div>
            </form>
        </div>
    </div