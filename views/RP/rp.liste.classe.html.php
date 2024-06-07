    <div class="new">
        <label for="">Cliquez sur le button pour creer une nouvelle classe</label>
        <a href="<?=WEBROOT?>?action=add-classe"><button>Nouveau</button></a>
    </div>
    <div class="container">
        <div class="tab">
        <h2>Liste des classes</h2>
        <form class="filtre" action="<?WEBROOT?>" method="post">
            <label for="">Niveau</label>
            <select name="niveau" id="">
                <option value="All" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'All') echo 'selected'; ?>>All</option>
                <option value="Licence1" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'Licence1') echo 'selected'; ?>>Licence1</option>
                <option value="Licence2" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'Licence2') echo 'selected'; ?>>Licence2</option>
                <option value="Licence3" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'Licence3') echo 'selected'; ?>>Licence3</option>
                <option value="master1" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'Master1') echo 'selected'; ?>>Master1</option>
                <option value="master2" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'Master2') echo 'selected'; ?>>Master2</option>
                <option value="Doctorat" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == 'Doctorat') echo 'Doctorat'; ?>>Master2</option>
            </select>
            <button type="submit" name="action" value="form-filtre-classe">OK</button>
        </form>
            <table class="tab">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Niveau</th>
                    <th>Filiere</th>
                    <th>Libele</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($classes as $classe):?>
                    <tr>
                        <td><?php echo $classe["id"];?></td>  
                        <td><?php echo $classe["niveau"];?></td>
                        <td><?php echo $classe["filiere"];?></td>
                        <td><?php echo $classe["libele"];?></td>
                    </tr>
                <?php endforeach?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
        <button>Precedent</button>
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>Suivant</button>
        </div>
    </div>