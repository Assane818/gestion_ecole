<div class="container1">
        <div action="" class="content">
            <h2>Affectez une module a un professeur</h2>
            <form class="choix1" action="<?WEBROOT?>" method="post">
            <div class="name1">
                    <P>NOM: <span><?= $prof['nom']?></span></P>
                    <p>PRENOM: <span><?= $prof['prenom']?></span></p>
                    <p>GRADE: <span><?= $prof['grade']?></span></p>
                </div>
                <div class="check">
                    <h3>Modules:</h3>
                    <input type="checkbox" name="module[]" value="PHP">
                    <label for="">PHP</label>
                    <input type="checkbox" name="module[]" value="Algo">
                    <label for="">Algo</label>
                    <input type="checkbox"  name="module[]" value="Python">
                    <label for="">Python</label>
                    <input type="checkbox" name="module[]" value="UML">
                    <label for="">UML</label>
                </div>
                <div class="send">
                    <button type="reset"><a href="<?=WEBROOT?>?action=liste-prof">Annuler</a></button>
                    <button type="submit" name="action" value ="form-affect-module">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>