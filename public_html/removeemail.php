<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    
      $email = $_POST['email'];

      $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
      or die('Falha a se comunicar com o servidor');

      $query = "DELETE FROM email_list WHERE email= '$email'";

      mysqli_query($dbc, $query)
      or die ('Erro ao consultar o banco de dados');

      echo 'cliente removido '.$email;

      mysqli_close($dbc);
     ?>
  </body>
</html>
