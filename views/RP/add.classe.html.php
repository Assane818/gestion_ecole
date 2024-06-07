<div class="container1">
        <div action="" class="content">
            <h2>Ajoutez une nouvelle classe</h2>
            <form class="choix" action="<?WEBROOT?>" method="post">
                <label for="">Niveau:</label>
                <select name="niveau" id="">
                    <option value="Licence1">Licence1</option>
                    <option value="Licence2">Licence2</option>
                    <option value="Licence3">Licence3</option>
                    <option value="Master1">Master1</option>
                    <option value="Master2">Master2</option>
                    <option value="Doctorat">Doctorat</option>
                </select>
                <label for="">Filiere:</label>
                <select name="filiere" id="">
                    <option value="GLRS">GLRS</option>
                    <option value="ETSE">ETSE</option>
                    <option value="IAGE">IAGE</option>
                    <option value="TTL">TTL</option>
                    <option value="CPD">CPD</option>
                    <option value="CDSD">CDSD</option>
                </select>
                <div class="area">
                    <label for=""><i class='bx bxs-edit-alt'></i>Nom de la classe</label>
                    <input type="text" name="libele" id="" ></input>
                </div>
                <div class="send">
                    <button type="reset"><a href="<?=WEBROOT?>?action=liste-classe">Annuler</a></button>
                    <button type="submit" name="action" value ="form-add-classe">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>