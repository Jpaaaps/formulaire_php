<?php

  $firstname = $lastname = $email = $phone = $message = "";
  $firstnameError = $lastnameError = $emailError = $phoneError = $messageError = "";
  $isSuccess = false;
  $to = "jpgerard87@gmail.com";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = verifyInput($_POST["firstname"]);
    $lastname = verifyInput($_POST["lastname"]);
    $email = verifyInput($_POST["email"]);
    $phone = verifyInput($_POST["phone"]);
    $message = verifyInput($_POST["message"]);
    $isSuccess = true;
    $emailText = "";

    if(empty($firstname)){
      $firstnameError = "Comment t'appeles-tu?";
      $isSuccess = false;
    } else {
      $emailText .= "Firstname: $firstname\n";
    }

    if(empty($lastname)){
      $lastnameError = "J'en ai besoin également!";
      $isSuccess = false;
    } else {
      $emailText .= "Name: $lastname\n";
    }

    if (!isEmail($email)){
      $emailError = "Ce n'est pas vraiment une adresse mail...";
      $isSuccess = false;
    } else {
      $emailText .= "Email: $email\n";
    }

    if (!isPhone($phone)){
      $phoneError = "Je n'ai besoin que de chiffres et/ou espaces";
      $isSuccess = false;
    } else {
      $emailText .= "Phone number: $phone\n";
    }

    if (empty($message)){
      $messageError = "Que voulais-tu me dire?";
      $isSuccess = false;
    } else {
      $emailText .= "Message: $message\n";
    }

    if ($isSuccess) {
      $headers = "From: $firstname $lastname <$email>\r\nReply-To: $email";
      mail($to, "Un message de votre site", $emailText, $headers);
      $firstname = $lastname = $email = $phone = $message = "";
    }
  }

  function isEmail($var) {
    return filter_var($var, FILTER_VALIDATE_EMAIL);
  }

  function isPhone($var) {
    return preg_match("/^[0-9 ]*$/", $var);
  }

  function verifyInput($var) {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);

    return $var;
  }

?>

<!DOCTYPE html>
<html>

  <head>
    <title>Contactez-moi</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
  </head>

  <body>
    <div class='container'>
      <div class='divider'></div>
      <div class='heading'>
        <h2>Contactez-moi</h2>
      </div>
      <div class="row">
        <div class="col-lg-10 offset-lg-1">

          <form id="contact-form" method="post" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="row">

              <div class="col-md-6">
                <label for="firstname">Prénom<span class="blue"> *</span></label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?= $_POST["firstname"];?>">
                <p class="comments"><?php echo $firstnameError; ?></p>
              </div>

              <div class="col-md-6">
                <label for="lastname">Nom<span class="blue"> *</span></label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Votre Nom" value="<?= $_POST["lastname"];?>">
                <p class="comments"><?php echo $lastnameError; ?></p>
              </div>

              <div class="col-md-6">
                <label for="email">Email<span class="blue"> *</span></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?= $_POST["email"];?>">
                <p class="comments"><?php echo $emailError; ?></p>
              </div>

              <div class="col-md-6">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" value="<?= $_POST["phone"];?>">
                <p class="comments"><?php echo $phoneError; ?></p>
              </div>

              <div class="col-md-12">
                <label for="message">Message<span class="blue"> *</span></label>
                <textarea name="message" id="message" class="form-control" placeholder="Votre message" cols="30" rows="3" value="<?= $_POST["message"];?>"></textarea>
                <p class="comments"><?php echo $messageError; ?></p>
              </div>

              <div class="col-md-12">
                <p class="blue"><strong>* Ces informations sont requises</strong></p>
              </div>

              <div class="col-md-12">
                <input type="submit" class="button1" value="envoyer">
              </div>

            </div>
            <p class="thank-you" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre message a bien été envoyé!</p>
          </form>
          
        </div>
      </div>
    </div>
  </body>

</html>
