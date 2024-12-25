<?php
require_once("db.php");



function setUser($name, $email, $password, $code_verefy)
{
  global $cnx;
  $stsmnt = $cnx->prepare(" INSERT INTO `users`(   `name`, `email`, `password`, `code_verefy`) VALUES (?,?,?,?)");
  $stsmnt->execute([$name, $email, $password, $code_verefy]);
}

function getUsersWhere($where = "")
{
  global $cnx;
  $stsmnt = $cnx->query("select * from users $where ");
  return  $stsmnt->fetchAll();
}

function verefyUserEmail($email,$active=" ")
{
  $res = getUsersWhere("  where email = '$email' $active");
  return $res[0] ?? [];
}

function updateWithEmail($email, $data)
{
  global $cnx;
  $query = "";
  foreach ($data as $key => $val) {
    $query .= "  $key = $val ,";
  }
  $query = rtrim($query, ",");
  $query = "UPDATE `users` SET $query  WHERE email = '$email'";
  $cnx->exec($query);
}

function activeUserWithCode($code)
{
  global $cnx;  
  $query = "UPDATE `users` SET etat =1 WHERE code_verefy =$code ";
  $cnx->exec($query);
}







/************ MAILER **************************/


include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $msg)
{
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';


  // $mail->SMTPDebug = 2;   
  $mail->Username = 'test0022a@gmail.com';
  $mail->Password = "fjjdcwvkcjtdbsha"; // code Application
  $mail->SetFrom("test0022a@gmail.com");



  $mail->Subject = $subject;
  $mail->Body = $msg;
  $mail->AddAddress($to);
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if (!$mail->Send()) {
    echo "<p>Erroros Here <p>";
    echo $mail->ErrorInfo;
  } else {
    return 'Sent';
  }
}
