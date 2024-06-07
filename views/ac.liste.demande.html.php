  </div>
  
  <div class="container">
    <div class="tab">
      <h2>Liste de mes demandes</h2>
      <form class="filtre" action="<?WEBROOT?>" method="post">
        <label for="">Etat</label>
          <select name="etat" id="">
          <option value="All" <?php if(isset($_POST['etat']) && $_POST['etat'] == 'All') echo 'selected'; ?>>All</option>
            <option value="Encours" <?php if(isset($_POST['etat']) && $_POST['etat'] == 'Encours') echo 'selected'; ?>>Encours</option>
            <option value="Accepter" <?php if(isset($_POST['etat']) && $_POST['etat'] == 'Accepter') echo 'selected'; ?>>Accepter</option>
            <option value="Refuser" <?php if(isset($_POST['etat']) && $_POST['etat'] == 'Refuser') echo 'selected'; ?>>Refuser</option>
          </select>
          <button type="submit" name="action" value="form-fitre-Alldemande">OK</button>
      </form>
      <table class="tab">
        <thead>
          <tr>
            <th>Matricule</th>
            <th>Nom et Prenom</th>
            <th>Classe</th>
            <th>Date</th>
            <th>Type</th>
            <th>Etat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($demandes as $value):?>
            <tr>
              <td><?php echo $value["matricule"];?></td>
              <td><?php echo $value["nom"]."".$value["prenom"];?></td>
              <td><?php echo $value["libele"];?></td>
              <td><?php echo $value["date"];?></td>
              <td><?php echo $value["type"];?></td>
              <td><?php echo $value["Etat"];?></td>
              <td><a href="<?=WEBROOT?>/?action=detail-demande&demande_id=<?=$value['id']?>">Details</a></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
