<?php
   function getAllData(string $key):array{
      return fromJsonToArray("$key");
   }

   function getAllAnnees():array{
      return getAllData("annees");
   }

   function getAllClasse($niveau = "All"):array{
      $classes = getAllData("classes");
      $classeNiveau = [];
      foreach($classes as $classe){
         if($niveau == "All"){
            $classeNiveau[] = $classe;
         }
         else{
            if($classe['niveau'] == $niveau){
               $classeNiveau[] = $classe;
            }
         }
      }
      return $classeNiveau;
   }
   
   function getAllUsers():array{
      return getAllData("users");
   }

   function getAllProf($module = "All"):array{
      $profs = getAllData("profs");
      $profModule = [];
      foreach($profs as $prof){
         if($module == "All"){
            $profModule[] = $prof;
         }
         else{
            foreach($prof['module'] as $value){
               if($value == $module){
                  $profModule[] = $prof;
               }
            }
         }
      }
      return $profModule;
   }

   function getAllUsersByRole(string $role):array{
      $users = getAllUsers();
      $etudiants = [];
      foreach($users as $user){
         if($user["role"] == $role){
            $etudiants[] = $user;
         }
      }
      return $etudiants;
   }

   function getAllEtudiants():array{
      $etudiants = getAllUsersByRole("ROLE_ETUDIANT");
      $etudiantClasse = [];
      foreach($etudiants as $etudiant){
         $classe = getClasseById($etudiant["classe_id"]);
         $etudiantClasse[] = array_merge($classe,$etudiant);
      }
      return $etudiantClasse;
   }

   function getAllDemandes(int|null $annee_id = null, $etat = "All"):array{
      $demandes = getAllData("demandes");
      if ($annee_id == null) return $demandes;

      $demandeEtu = [];
      foreach ($demandes as $demande){
         if($etat == "All"){
            if ($demande['annee_id'] == $annee_id) {
               $demandeEtu[] = array_merge(getEtudiantById($demande['etudiant_id']), $demande);
            }
         }
         else{
            if($demande['annee_id'] == $annee_id && $demande['Etat'] == $etat){
               $demandeEtu[] = array_merge(getEtudiantById($demande['etudiant_id']), $demande);
            }
         }
      }
      return $demandeEtu;
  }
  function getDemandeById(int $annee_id, int $id):array{
   $demandes = getAllDemandes($annee_id);
   return getDataById($demandes,$id);
  }

   function connexion(string $login,string $passer):array|null{
      $users = getAllUsers();
      foreach($users as $user){
         if($user['login'] == $login && $user['password'] == $passer){
            if($user['role'] == "ROLE_ETUDIANT"){
               $classe = getClasseById($user['classe_id']);
               $user = array_merge($classe,$user);
            }
            return $user;
         }
      }
      return null;
   }

   function getAnneeEncours():array|null{
      $annees = getAllAnnees();
      foreach($annees as $value){
         if($value['etat']== 1){
            return $value;
         }
      }
      return null;
   }

   function getDemandeByEtudiantAndAnneeEncours(int $etudiantId, int $anneeId, $etat = "All"):array{
      $demandes = getAllDemandes($anneeId);
      $demandeEtu = [];
      foreach($demandes as $value){
         if($etat == "All"){
            if($value['etudiant_id'] == $etudiantId){
               $demandeEtu[] = $value;
            }
         }else{
            if($value['etudiant_id'] == $etudiantId && $value['Etat'] == $etat){
               $demandeEtu[] = $value;
            }
         }
      }
      return $demandeEtu;
   }

   function getDataById(array $data, int|string $id, string $key='id'):array|null{
      foreach($data as $value){
         if($value[$key] == $id){
            return $value;
         }
      }
      return null;
   }

   function getClasseById(int $classe_id):array|null{
      $classes = getAllClasse();
      return getDataById($classes,$classe_id);
   }

   function getEtudiantById(int $id):array|null{
      $etudiants = getAllEtudiants();
      return getDataById($etudiants,$id);
   }


   function addDemande(array $demande):void{
      fromArrayToJson("demandes",$demande);
   }
   function addClasse(array $classe):void{
      fromArrayToJson("classes",$classe);
   }
   function addProf(array $prof):void{
      fromArrayToJson("profs",$prof);
   }

   function getLastId(array $data, int $i = 1):int{
      foreach($data as $value){
         if($value['id'] == $i){
            $i++;
         }
      }
      return $i;
   }

   function getLastDemandeId():int{
      $demandes = getAllDemandes();
      return getLastId($demandes);
   }

   function getLastClasseId():int{
      $classes = getAllClasse();
      return getLastId($classes);
   }

   function getLastProfId():int{
      $profs = getAllProf();
      return getLastId($profs);
   }

   function getnewDate():string{
      $date = date("d/m/Y");
      return $date;
   }
   function getClasseIdByName(array $classesSelect):array{
      $classes = getAllClasse();
      $classesSelectId = [];
      foreach($classesSelect as $classeSelect){
         foreach($classes as $classe){
            if($classe['libele'] === $classeSelect){
               $classesSelectId[] = $classe['id'];
            }
         }
      }
      return $classesSelectId;
   }
   function getProfById(int $id):array{
      $profs = getAllProf();
      return getDataById($profs,$id);
   }

   function getClassNotChosen(array $classes, array $profClass){
      $classNotChosen = [];
      foreach($classes as $classe){
         if(!in_array($classe['id'],$profClass)){
            $classNotChosen[] = $classe;
         }
      }
      return $classNotChosen;
   }

   function addClasseIdToProf(int $profId, array $newClasse){
      fromArrayToJsonUpdate("profs","classe_id",$profId,$newClasse);
   }

   function addModuleToProf(int $profId, array $newModule){
      fromArrayToJsonUpdate("profs","module",$profId,$newModule);
   }

   function getProfClasse(int $id):array{
      $profs = getAllProf();
      $profClasse = [];
      foreach($profs as $prof){
         if($prof['id'] == $id){
            foreach($prof['classe_id'] as $value){
               $profClasse[] = array_merge(getClasseById($value),$prof);
            }
         }
      }
      return $profClasse;
   }
?>
