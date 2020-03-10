  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $from = 'rochajotaerre@gmail';
      $subject = $_POST['subject'];
      $text = $_POST['elvismail'];

      if(empty($subject) && empty($text)){
        echo 'Você esqueceu a assunto e o corpo da mensagem!';
      }
      if((empty($subject)) && (!empty($text))){
        echo 'Você esqueceu de preencher o campo assunto';
      }
      if((!empty($subject)) && empty($text)){
        echo 'Você esqueceu o corpo da mensagem';
      }
      if((!empty($subject)) && (!empty($text))){
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
        or die('Erro de conexão com o servidor MYSQL');

        $query = "SELECT * FROM email_list";
        $result = mysqli_query($dbc, $query)
        or die('Erro ao consultar banco de dados');

        while($row = mysqli_fetch_array($result)) {
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];

          $msg = "Dear $first_name $last_name, \n $text";
          $to = $row ['email'];
          mail('$to', '$subject', '$msg', 'From: '.$from);
          echo 'Email sent to: '.$to.'<br/>';
        }


        mysqli_close($dbc);
      }

     ?>
  </body>
</html>
