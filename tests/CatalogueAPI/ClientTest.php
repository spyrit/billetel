<?php

namespace Tests\CatalogueAPI;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\Psr6CacheStorage;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use PHPUnit\Framework\TestCase;
use Spyrit\Billetel\Client\ArtistsClient;
use Spyrit\Billetel\Client\CategoriesClient;
use Spyrit\Billetel\Client\EventsClient;
use Spyrit\Billetel\Client\GroupsClient;
use Spyrit\Billetel\Client\PlacesClient;
use Spyrit\Billetel\Client\TicketOfficesClient;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;


class ClientTest extends TestCase
{
    const AUTHORIZATION = 'BASIC aWJvbHYwMjE6MDkwYzc1OTJjMGE4MmUwYjA2MTVjYmJmNGYxZjY5MzQ=';
    const DESK = 'BOLBOL01';
    const URL = 'http://api.billetel.fr';

    protected function setUp()
    {
        $stack = HandlerStack::create();
        $cache_storage = new Psr6CacheStorage(new FilesystemAdapter('', 0, 'cache'), 60);
        $middleware = new CacheMiddleware(new GreedyCacheStrategy($cache_storage, 3600));
        $stack->push($middleware, 'cache');
        $httpClient = new Client(['handler' => $stack]);

        $this->artistsClient = new ArtistsClient(self::URL, self::AUTHORIZATION, self::DESK, $httpClient);
        $this->categoriesClient = new CategoriesClient(self::URL, self::AUTHORIZATION, self::DESK, $httpClient);
        $this->eventsClient = new EventsClient(self::URL, self::AUTHORIZATION, self::DESK, $httpClient);
        $this->groupsClient = new GroupsClient(self::URL, self::AUTHORIZATION, self::DESK, $httpClient);
        $this->placesClient = new PlacesClient(self::URL, self::AUTHORIZATION, self::DESK, $httpClient);
        $this->ticketOfficesClient = new TicketOfficesClient(self::URL, self::AUTHORIZATION, self::DESK, $httpClient);
    }

    public function testArtistsClient()
    {
        $result = $this->artistsClient->get();

        $this->assertTrue(isset($result->artist));

        $results = $result->artist;

        $this->assertGreaterThan(1, count($results));

        $first = $results[0];

        $this->assertTrue(isset($first['id']));
    }

    public function testCategoriesClient()
    {
        $result = $this->categoriesClient->get();

        $this->assertTrue(isset($result->category));

        $results = $result->category;

        $this->assertGreaterThan(1, count($results));

        $first = $results[0];

        $this->assertTrue(isset($first['id']));
    }

    public function testEventsClient()
    {
        $result = $this->eventsClient->get();

        $this->assertTrue(isset($result->event));

        $results = $result->event;

        $this->assertGreaterThan(1, count($results));

        $first = $results[0];

        $this->assertTrue(isset($first['id']));
    }

    public function testGroupsClient()
    {
        $result = $this->groupsClient->get();

        $this->assertTrue(isset($result->group));

        $results = $result->group;

        $this->assertGreaterThan(1, count($results));

        $first = $results[0];

        $this->assertTrue(isset($first['id']));
    }

    public function testPlacesClient()
    {
        $result = $this->placesClient->get();

        $this->assertTrue(isset($result->place));

        $results = $result->place;

        $this->assertGreaterThan(1, count($results));

        $first = $results[0];

        $this->assertTrue(isset($first['id']));
    }

    public function testTicketOfficesClient()
    {
        $result = $this->ticketOfficesClient->get();

        $this->assertTrue(isset($result->ticketOffice));

        $results = $result->ticketOffice;

        $this->assertGreaterThan(1, count($results));

        $first = $results[0];

        $this->assertTrue(isset($first['id']));
    }
}

