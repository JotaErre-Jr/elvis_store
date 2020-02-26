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

      $bd = mysqli_connect('localhost', 'root', '', 'elvis_store')
      or die('Erro ao conectar servidor MYQL');

      $query = "INSERT INTO email_list(first_name, last_name, email)
      VALUES ('$firstname', '$lastname', '$email')";

      $result = mysqli_query($bd, $query)
      or die('Erro requisição ao banco de dados');
       mysqli_close($bd);

      echo 'Cadastrado'.'<br/>';
      echo 'Meu nome: '.$firstname.' '.$lastname.'<br/>';
      echo 'Meu e-mail: '.$email.'<br/>';
     ?>
  </body>
</html>
