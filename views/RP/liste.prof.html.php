<div class="new">
    <label for="">Cliquez sur le button pour ajouter une nouveau professeur</label>
    <a href="<?=WEBROOT?>?action=add-prof"><button>Nouveau</button></a>
  </div>
  <div class="container">
    <div class="tab">
      <h2>Liste des professeurs</h2>
      <form class="filtre" action="<?WEBROOT?>" method="post">
        <label for="">Module</label>
          <select name="module" id="">
            <option value="All" <?php if(isset($_POST['module']) && $_POST['module'] == 'All') echo 'selected'; ?>>All</option>
            <option value="PHP" <?php if(isset($_POST['module']) && $_POST['module'] == 'PHP') echo 'selected'; ?>>PHP</option>
            <option value="Python" <?php if(isset($_POST['module']) && $_POST['module'] == 'Python') echo 'selected'; ?>>Python</option>
            <option value="UML" <?php if(isset($_POST['module']) && $_POST['module'] == 'UML') echo 'selected'; ?>>UML</option>
            <option value="Algo" <?php if(isset($_POST['module']) && $_POST['module'] == 'Algo') echo 'selected'; ?>>Algo</option>
          </select>
          <button type="submit" name="action" value="form-filtre-module">OK</button>
      </form>
          <table class="tab">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom et Prenom</th>
                <th>Grade</th>
                <th>Module</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($profs as $prof):?>
                <tr>
                    <td><?php echo $prof["id"];?></td>
                    <td><?php echo $prof["nom"]." ".$prof["prenom"];?></td>
                    <td><?php echo $prof["grade"];?></td>
                    <td><?php echo implode(", ", $prof["module"]);?></td>
                    <td><a href="<?=WEBROOT?>/?action=affecter-classe&prof_id=<?=$prof['id']?>">Classe</a> || <a href="<?=WEBROOT?>/?action=affecter-module&prof_id=<?=$prof['id']?>">Module</a> || <a href="<?=WEBROOT?>/?action=liste-classe-prof&prof_id=<?=$prof['id']?>">Liste classes</a></td>
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