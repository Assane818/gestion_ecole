<?php
  ob_start();
  define("WEBROOT","http://localhost:8000");
  define("DB","../db/ges_inscription.json");
  require_once("../db/convert.php");
  require_once("../model/demande.repository.php");
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?= WEBROOT?>/CSS/style.css">
  <link rel="stylesheet" href="<?= WEBROOT?>/CSS/style1.css">
  <link rel="stylesheet" href="<?= WEBROOT?>/CSS/style2.css">
  <link rel="stylesheet" href="<?= WEBROOT?>/CSS/connexion.css">
  <link rel="stylesheet" href="<?= WEBROOT?>/CSS/add.prof.css">
  <link rel="stylesheet" href="<?= WEBROOT?>/CSS/affecter.classe.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <?php
    if(isset($_REQUEST["action"])){
      require_once("../views/partial/nav.html.php");
      if($_REQUEST["action"] == "add"){
        require_once("../views/add.demande.html.php");
      }
      elseif($_REQUEST["action"] == "liste"){
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION['userConnect']['id'],$_SESSION['anneeEncours']['id']);
        require_once("../views/liste.demande.html.php");
      }
      elseif($_REQUEST["action"] == "liste-ac"){
        $demandes = getAllDemandes($_SESSION['anneeEncours']['id']);
        require_once("../views/ac.liste.demande.html.php");
      }
      elseif($_REQUEST['action'] == "form-fitre-Alldemande"){
        $etat = $_REQUEST['etat'];
        $demandes = getAllDemandes($_SESSION['anneeEncours']['id'],$etat);
        require_once("../views/ac.liste.demande.html.php");
      }
      elseif($_REQUEST["action"] == "detail-demande"){
        $demandeId = $_GET["demande_id"];
        $demande = getDemandeById($_SESSION['anneeEncours']['id'],$demandeId);
        require_once("../views/detail.demande.html.php");
      }
      elseif($_REQUEST["action"] == "logout"){
        unset($_SESSION['userConnect']);
        unset($_SESSION['anneeEncours']);
        unset($_SESSION['classe']);
        session_destroy();
        header("location:".WEBROOT);
      }
      elseif($_REQUEST["action"] == "form-filtre-demande"){
        $etat = $_REQUEST['etat'];
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION['userConnect']['id'],$_SESSION['anneeEncours']['id'],$etat);
        require_once("../views/liste.demande.html.php");
      }
      elseif($_REQUEST["action"] == "form-add-demande"){
        $newDemande = [
          "id" => getLastDemandeId(),
          "date" => getnewDate(),
          "Etat" => "Encours",
          "type" => $_REQUEST['type'],
          "Motif" => $_REQUEST['motif'],
          "etudiant_id" => $_SESSION['userConnect']['id'],
          "annee_id" => $_SESSION['anneeEncours']['id'],
        ];
        addDemande($newDemande);
        $demandes = getDemandeByEtudiantAndAnneeEncours($_SESSION['userConnect']['id'],$_SESSION['anneeEncours']['id']);
        header("location:".WEBROOT."?action=liste");
      }
      elseif($_REQUEST["action"] == "form-login"){
        $login = $_POST['login'];
        $password = $_POST['password']; 
        $etudiantConnect = connexion($login,$password);
        if($etudiantConnect == null){
          header("location:".WEBROOT);
        }
        else{
          $_SESSION['userConnect'] = $etudiantConnect;
          $_SESSION['anneeEncours'] = getAnneeEncours();
          if($etudiantConnect['role'] == "ROLE_ETUDIANT"){
            header("location:".WEBROOT."?action=liste");
          }
          elseif($etudiantConnect['role'] == "ROLE_AC"){
            header("location:".WEBROOT."?action=liste-ac");
          }
          elseif($etudiantConnect['role'] == "ROLE_RP"){
            header("location:".WEBROOT."?action=liste-classe");
          }
        }
      }
      elseif($_REQUEST['action'] == "liste-classe"){
        $classes = getAllClasse();
        require_once("../views/RP/rp.liste.classe.html.php");
      }
      elseif($_REQUEST['action'] == "form-filtre-classe"){
        $niveau = $_REQUEST['niveau'];
        $classes = getAllClasse($niveau);
        require_once("../views/RP/rp.liste.classe.html.php");
      }
      elseif($_REQUEST['action'] == "add-classe"){
        require_once("../views/RP/add.classe.html.php");
      }
      elseif($_REQUEST["action"] == "form-add-classe"){
        $newClasse = [
          "id" => getLastClasseId(),
          "filiere" => $_REQUEST['filiere'],
          "niveau" => $_REQUEST['niveau'],
          "libele" => strtoupper($_REQUEST['libele']),
        ];
        addClasse($newClasse);
        $classes = getAllClasse();
        header("location:".WEBROOT."?action=liste-classe");
      }
      elseif($_REQUEST['action'] == "liste-prof"){
        $profs = getAllProf();
        require_once("../views/RP/liste.prof.html.php");
      }
      elseif($_REQUEST['action'] == "form-filtre-module"){
        $module = $_REQUEST['module'];
        $profs = getAllProf($module);
        require_once("../views/RP/liste.prof.html.php");
      }
      elseif($_REQUEST['action'] == "add-prof"){
        $classes = getAllClasse();
        require_once("../views/RP/add.prof.html.php");
      }
      elseif($_REQUEST["action"] == "form-add-prof"){
        $newProf = [
          "id" => getLastProfId(),
          "nom" => $_REQUEST['nom'],
          "prenom" => $_REQUEST['prenom'],
          "grade" => $_REQUEST['grade'],
        ];
        $newProf['module'] = $_REQUEST['module'];
        $newProf['classe_id'] = getClasseIdByName($_REQUEST["classe"]);
        addProf($newProf);
        $profs = getAllProf();
        header("location:".WEBROOT."?action=liste-prof");
      }
      elseif($_REQUEST['action'] == "affecter-classe"){
        $profId = $_GET["prof_id"];
        $prof = getProfById($profId);
        $classes = getAllClasse();
        $profClasses = getClassNotChosen($classes,$prof['classe_id']);
        require_once("../views/RP/affecter.classe.html.php");
      }
      elseif($_REQUEST["action"] == "form-affect-classe"){
        $profId = $_GET["prof_id"];
        $newClasse = getClasseIdByName($_REQUEST["classe"]);
        addClasseIdToProf($profId,$newClasse);
        $profs = getAllProf();
        header("location:".WEBROOT."?action=liste-prof");
      }
      elseif($_REQUEST['action'] == "affecter-module"){
        $profId = $_GET["prof_id"];
        $prof = getProfById($profId);
        $classes = getAllClasse();
        $profClasses = getClassNotChosen($classes,$prof['classe_id']);
        require_once("../views/RP/affecter.module.html.php");
      }
      elseif($_REQUEST["action"] == "form-affect-module"){
        $profId = $_GET["prof_id"];
        $newModule = $_REQUEST["module"];
        addModuleToProf($profId,$newModule);
        $profs = getAllProf();
        header("location:".WEBROOT."?action=liste-prof");
      }
      elseif($_REQUEST['action'] == "liste-classe-prof"){
        $profId = $_GET['prof_id'];
        $prof = getProfClasse($profId);
        require_once("../views/RP/liste.classe.prof.html.php");
      }
      
    }else{
      require_once("../views/security/page.connexion.html.php");
    }
  ?>
</body>
</html>