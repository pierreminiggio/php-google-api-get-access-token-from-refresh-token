# php-google-api-get-access-token-from-refresh-token

Install using composer :
```console
composer require pierreminiggio/google-api-get-access-token-from-refresh-token
```

```php
use PierreMiniggio\GoogleTokenRefresher\AccessTokenProvider;

$provider = new AccessTokenProvider();
$accessToken = $provider->get('yourClientId', 'yourClientSecret', 'yourRefreshToken');
```
