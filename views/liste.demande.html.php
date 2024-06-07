<?php
 /*
  * =========================== Table Html =========
    Date    Type   Motif    Eta
    ====  
    ====
    ==== 
  */
?>
  <div class="new">
    <label for="">Cliquez sur le button pour creer une nouvelle demande</label>
    <a href="<?=WEBROOT?>?action=add"><button>Nouveau</button></a>
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
          <button type="submit" name="action" value="form-filtre-demande">OK</button>
      </form>
          <table class="tab">
            <thead>
              <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Etat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($demandes as $value):?>
                <tr>
                  <td><?php echo $value["date"];?></td>
                  <td><?php echo $value["type"];?></td>
                  <td><?php echo $value["Etat"];?></td>
                  <td><a href="<?=WEBROOT?>/?action=detail-demande&demande_id=<?=$value['id']?>">Details</a></td>
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

