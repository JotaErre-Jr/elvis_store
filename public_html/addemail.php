<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $email = $_POST['e_mail'];

      echo 'Cadastrado'.'<br/>';
      echo 'Meu nome:'.$firstname.' '.$lastname.'<br/>';
      echo 'Meu e-mail'.$email.'<br/>';
     ?>
  </body>
</html>
