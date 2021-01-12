<?php

	$firstname = $name = $email = $phone = $message = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$firstname = verifyInput($_POST["firstname"]);
		$name = verifyInput($_POST["name"]);
		$email = verifyInput($_POST["email"]);
		$phone = verifyInput($_POST["phone"]);
		$message = verifyInput($_POST["message"]);
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
		<!-- font si besoin link href -->
		<link rel="stylesheet" href="CSS/style.css">
	</head>

	<body>
		<div class='container'>
			<div class='divider'></div>
			<div class='heading'>
				<h2>Contactez-moi</h2>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">

					<form  id="contact-form" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<div class="row">
							<div class="col-md-6">
								<label for="firstname">Prénom<span class="blue"> *</span></label>
								<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
								<p class="comments">Message d'erreur</p>
							</div>
							<div class="col-md-6">
								<label for="lastname">Nom<span class="blue"> *</span></label>
								<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Votre Nom" value="<?php echo $name; ?>">
								<p class="comments">Message d'erreur</p>
							</div>
							<div class="col-md-6">
								<label for="email">Email<span class="blue"> *</span></label>
								<input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>">
								<p class="comments">Message d'erreur</p>
							</div>
							<div class="col-md-6">
								<label for="phone">Téléphone</label>
								<input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" value="<?php echo $phone; ?>">
								<p class="comments">Message d'erreur</p>
							</div>
							<div class="col-md-12">
								<label for="message">Message<span class="blue"> *</span></label>
								<textarea name="message" id="message" class="form-control" placeholder="Votre message" cols="30" rows="4" value="<?php echo $message; ?>"></textarea>
								<p class="comments">Message d'erreur</p>
							</div>
							<div class="col-md-12">
								<p class="blue"><strong>* Ces informations sont requises</strong></p>
							</div>
							<div class="col-md-12">
								<input type="submit" class="button1" value="envoyer">
							</div>
						</div>
						<p class="thank-you">Votre message a bien été envoyé!</p>
					</form>
					
				</div>
			</div>
		</div>
	</body>

</html>