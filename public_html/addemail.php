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

      $db = mysqli_conect('localhost', 'root', '', 'elvis_store')
      or die('Erro ao conectar servidor MYQL');
      $query = "INSERT INTO email_list(first_name, last_name, email)
      VALUES ('$firstname', '$lastname', '$emai')";

      $result = mysqli_query($db, $query)
      or die('Erro requisição ao banc de dados');
       mysqli_close($bd);

      echo 'Cadastrado'.'<br/>';
      echo 'Meu nome:'.$firstname.' '.$lastname.'<br/>';
      echo 'Meu e-mail'.$email.'<br/>';
     ?>
  </body>
</html>
