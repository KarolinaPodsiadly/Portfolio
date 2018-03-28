<?php

if ($_POST['submit']) {

$email = 'karolinapodsiadly95@gmail.com';

//dane z formularza
$formEmail = $_POST['formEmail'];
$formText = $_POST['formText'];

if(!empty($formEmail) && !empty($formText)) {

function checkMail($checkmail) {
  if(filter_var($checkmail, FILTER_VALIDATE_EMAIL)) {
    if(checkdnsrr(array_pop(explode("@",$checkmail)),"MX")){
        return true;
      }else{
        return false;
      }
  } else {
    return false;
  }
}

if (checkMail($formEmail)) {

  $ip = $_SERVER['REMOTE_ADDR'];
  $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

  $mailText = "Treść wiadomości:n$formTextnOd: $formEmail ($ip, $host)";

  $mailHeader = "From: <$formEmail>";

  @mail($email, 'Formularz kontaktowy', $mailText, $mailHeader) or die('Błąd: wiadomość nie została wysłana');

  echo 'Wiadomość została wysłana';
} else {
  echo 'Adres e-mail jest niepoprawny';
}

} else {
  echo 'Wypełnij wszystkie pola formularza';
}
}
?>