
    <div class="container1">
        <div action="" class="content">
            <h2>Ajoutez une nouvelle demande</h2>
            <form class="choix" action="<?WEBROOT?>" method="post">
                <label for="">Type:</label>
                <select name="type" id="">
                    <option value="Annulation">Annulation</option>
                    <option value="Suspension">Suspension</option>
                </select>
                <div class="area">
                    <label for=""><i class='bx bxs-edit-alt'></i>Motif</label>
                    <textarea name="motif" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="send">
                    <button type="reset"><a href="<?=WEBROOT?>?action=liste">Annuler</a></button>
                    <button type="submit" name="action" value ="form-add-demande">Valider</button>
                </div>
            </form>
        </div>
    </div>
