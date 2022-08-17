<?php

require_once 'Model/User.php';

// Initialisation tableau vide pour stocker les messages d'erreurs
$_SESSION['errors'] = array();


/*-------------------------------
          REGISTER USER 
--------------------------------*/

if (isset($_POST['submit_register'])) 
{
  // receive all input values from the form
  $regexPass = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
  $login = htmlspecialchars($_POST['login']);
  $password1 = htmlspecialchars($_POST['password1']);
  $password2 = htmlspecialchars($_POST['password2']);

  // form validation
  // by adding (array_push()) corresponding error unto $errors array  
  if (empty($login)) { array_push($_SESSION['errors'], "Un pseudo est obligatoire"); }
  if (empty($password1)) { array_push($_SESSION['errors'], "Un mot de passe est requis"); }
  if(!preg_match($regexPass, $password1)){
    array_push($_SESSION['errors'], "Mot de passe invalide");
  }
  if ($password1 != $password2) { array_push($_SESSION['errors'], "Les deux mots de passe ne correspondent pas."); }

  //check if user exists
  $chkExists = User::chkExists($login);
  
  if ( gettype($chkExists) == "array" ) {array_push($_SESSION['errors'], "L'utilisateur existe déjà"); }

  // Finally, register user if there are no errors in the form
  if ( count($_SESSION['errors']) == 0) 
  {
      User::register($login, $password1);
      header('location: ./login.php');
      
  }
}


/*-------------------------------
          LOGIN USER 
--------------------------------*/

if (isset($_POST['submit_connect'])) 
{
  // receive all input values from the form
  $password = htmlspecialchars($_POST['password']);
  $login = htmlspecialchars($_POST['login']);

  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if(empty($login)|| empty($password)){array_push($_SESSION['errors'], "Veuillez remplir tous les champs.");}

  // check the database to make sure 
  // a user does already exist with the same login and password
  $checkExists = User::chkExists($login);
  if ( !$checkExists && !empty($login)&& !empty($password )) {array_push($_SESSION['errors'], "Erreur de login ou de mot de passe"); }
  

  if (count($_SESSION['errors']) == 0) 
  {    
    if ( password_verify($password, $checkExists['password']))
    {
      session_start();    
      session_destroy();
      session_start();
      $userInfos = User::getAllInfs($login);
      $infoRows = $userInfos->fetch();
      $_SESSION['login'] = $infoRows["login"];
      $_SESSION['id'] = $infoRows["id_creator"];
      $_SESSION['connected'] = true;
      header('location: ./createGame.php');
    }
    else
    {
      array_push($_SESSION['errors'], "Erreur de login ou de mot de passe");
    }
      
  }
}


/*-------------------------------
        DISCONNECT CHANGE 
--------------------------------*/
if (isset($_POST['deconnexion'])) 
{
  session_start();
  session_destroy();
  header('Location: ./');
  exit;
}