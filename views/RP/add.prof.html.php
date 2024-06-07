    <div class="container1">
        <div action="" class="content">
            <h2>Ajoutez un nouveau professeur</h2>
            <form class="choix1" action="<?WEBROOT?>" method="post">
                <div class="name">
                    <input type="text" name="nom" id="" placeholder="Nom" required></input>
                    <input type="text" name="prenom" id="" placeholder="Prenom" required></input>
                </div>
                <label for="">GRADE:</label>
                <select name="grade" id="" required>
                    <option value="Ingenieur">Ingenieur</option>
                    <option value="Docteur">Docteur</option>
                    <option value="Profeseur">Profeseur</option>
                    <option value="Directeur">Directeur</option>
                </select>
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
                <div class="check">
                    <h3>Classes:</h3>
                    <?php foreach($classes as $classe):?>
                        <input type="checkbox" name="classe[]" value="<?php echo $classe['libele'] ?>">
                        <label for=""><?php echo $classe['libele'] ?></label>
                    <?php endforeach;?>
                </div>
                <div class="send">
                    <button type="reset"><a href="<?=WEBROOT?>?action=liste-prof">Annuler</a></button>
                    <button type="submit" name="action" value ="form-add-prof">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>