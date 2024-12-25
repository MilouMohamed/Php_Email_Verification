<?php
 


include_once 'functions.php'; 


// Lire les données envoyées dans le corps de la requête
$rawData = file_get_contents("php://input");

// Décoder les données JSON en tableau PHP
$data = json_decode($rawData, true);
  
  

// Vérifier si les données sont présentes
if (isset($data['email']) && isset($data['pass'])) {
  $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
  $pass = filter_var($data['pass'], FILTER_SANITIZE_STRING);
   
    
  $msg = "Password Or email is incorrct !!!"; 

  $success = false;
  $user = verefyUserEmail($email);
 
  

  if (count($user) > 0) {

    $passHash = $user['password']; 

    if (password_verify($pass, $passHash)) {
       
      
      if ($user['etat'] == 0) {
        $msg  = '   Success   but <br> You have not confirmed your account yet. Please check your inbox and verify your email code. ;';
      } else {
        $msg = '  Success  ';
        $success = true;
        session_start();
        $_SESSION["user"] = $user;
      }
    } else {
      $msg = ' Password is incorrect !!!  ';
    }
  }


  echo json_encode([
    'success' => $success,
    'message' => $msg,
  ]); 
} 