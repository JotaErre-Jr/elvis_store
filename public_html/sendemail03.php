<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $from = 'rochajotaerre@gmail.com';
      $subject = $_POST['subject'];
      $text = $_POST['elvismail'];
      $output_form = false;

      if (empty($subject) && empty($text)) {
        echo 'Você esqueceu o assunto e o corpo da mensagem.<br/>';
        $output_form = true;
      }

      if (empty($subject) && (!empty($text))) {
        echo 'Você esqueceu o assunto.<br/>';
        $output_form = true;
      }

      if ((!empty($subject)) && empty($text)) {
        echo 'Você esqueceu o corpo da mensagem.<br/>';
        $output_form = true;
      }

      if ((!empty($subject)) && (!empty($text))) {
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
        or die('erro ao conectar com o servidor');

        $query = "SELECT * FROM email_list";
        $result = mysqli_query($dbc, $query)
        or die ('Erro ao consuotar o banco de dados');

        while($row = mysqli_fetch_array($result)){
          $first_name = $row ['first_name'];
          $last_name = $row ['last_name'];

          $msg = "Dier $first_name $last_name, \n $text";
          $to = $row ['email'];
          mail('$to', '$subject', '$msg', 'From: '.$from);
          echo 'Email send to: '.$to.'<br/>';
        }
        mysqli_close($dbc);
      }
      if ($output_form) {
     ?>
       <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <label for="subject">Subject of email:</label><br/>
         <input type="text" name="subject" value=""><br/>

         <label for="elvismail">Body of email:</label><br/>
         <textarea name="elvismail" rows="8" cols="80"></textarea><br/>

         <input type="submit" name="submit" value="Enviar">
       </form>
       <?php
        }
        ?>
  </body>
</html>
