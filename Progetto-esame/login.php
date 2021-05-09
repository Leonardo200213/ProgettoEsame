<?php
require_once(__DIR__ . './google-api-php-client-2.4.1/vendor/autoload.php');
 
// inizializza la configutazione di google
$clientID = '628160639127-jkqhcokvfbr2utvfi9hk0mh079n4oipk.apps.googleusercontent.com'; 			// da console amministrazione google
$clientSecret = 'EyJkxbe8xtM47XqpdTRGoSGN'; 	// da console amministrazione google
$redirectUri = 'https://esame.com';			// pagina attuale per redirect dopo login con successo
  
// inizializza la Client Request per accedere alle Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");					// cosa ci serve sapere dell'utente
$client->addScope("profile");				// email + profile

 
if (!isset($_GET['code'])) {
  //prima richiesta alla pagina: visualizzai la pagina di login
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
} else {
  // Google OAuth Flow
  // $_GET['code'] valorizzato, lo tuilizzo per richiedere conferma a google
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
 
  // now you can use this profile info to create account in your website and make user logged in.
}
?>
