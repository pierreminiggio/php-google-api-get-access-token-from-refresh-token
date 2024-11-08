<?php

use PierreMiniggio\GoogleTokenRefresher\AccessTokenProvider;

$projectDirectory = __DIR__ . DIRECTORY_SEPARATOR;
require_once $projectDirectory . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = require_once $projectDirectory . 'config.php';

$accessTokenProvider = new AccessTokenProvider();
$accessToken = $accessTokenProvider->get($config['clientId'], $config['clientSecret'], $config['refreshToken']);

echo $accessToken;
