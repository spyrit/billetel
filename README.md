# Catalogue #

## Usage ##

In CLI:

    composer install

Basic PHP file:

    <?php
    require __DIR__.'/vendor/autoload.php';

    use GuzzleHttp\Client;
    use Spyrit\Billetel\Client\ArtistsClient;

    $url = 'http://api.billetel.fr';
    $authorization = 'BASIC aWJvbHYwMjE6MDkwYzc1OTJjMGE4MmUwYjA2MTVjYmJmNGYxZjY5MzQ=';
    $desk = 'BOLBOL01';

    $httpClient = new Client();
    $artistsClient = new ArtistsClient($url, $authorization, $desk, $httpClient);

    $artists = $artistsClient->get();