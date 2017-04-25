<?php

namespace Tests\CatalogueAPI;

use DOMElement;
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
use XMLReader;


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

    private function findInXML($xmlString, $elementName, $attributeName = null)
    {
        $reader = new XMLReader();
        $reader->XML($xmlString);

        while($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT && $reader->name == $elementName) {
                if ($attributeName) {
                    return $reader->getAttribute($attributeName);
                }
                return $reader->expand();
            }
        }
    }

    public function testArtistsClient()
    {
        $result = $this->artistsClient->get();

        $first = $this->findInXML($result, 'artist');

        $this->assertInstanceOf(DOMElement::class, $first);

        $firstName = $this->findInXML($result, 'firstName');

        $this->assertInstanceOf(DOMElement::class, $firstName);

        $firstId = $this->findInXML($result, 'artist', 'id');

        $this->assertNotFalse($firstId);
    }

    public function testCategoriesClient()
    {
        $result = $this->categoriesClient->get();

        $first = $this->findInXML($result, 'category');

        $this->assertInstanceOf(DOMElement::class, $first);

        $subcats = $this->findInXML($result, 'subCategories');

        $this->assertInstanceOf(DOMElement::class, $subcats);

        $firstId = $this->findInXML($result, 'category', 'id');

        $this->assertNotFalse($firstId);
    }

    public function testEventsClient()
    {
        $result = $this->eventsClient->get();

        $first = $this->findInXML($result, 'event');

        $this->assertInstanceOf(DOMElement::class, $first);

        $label = $this->findInXML($result, 'label');

        $this->assertInstanceOf(DOMElement::class, $label);

        $firstId = $this->findInXML($result, 'event', 'id');

        $this->assertNotFalse($firstId);
    }

    public function testGroupsClient()
    {
        $result = $this->groupsClient->get();

        $first = $this->findInXML($result, 'group');

        $this->assertInstanceOf(DOMElement::class, $first);

        $class = $this->findInXML($result, 'class');

        $this->assertInstanceOf(DOMElement::class, $class);

        $firstId = $this->findInXML($result, 'group', 'id');

        $this->assertNotFalse($firstId);
    }

    public function testPlacesClient()
    {
        $result = $this->placesClient->get();

        $first = $this->findInXML($result, 'place');

        $this->assertInstanceOf(DOMElement::class, $first);

        $label = $this->findInXML($result, 'label');

        $this->assertInstanceOf(DOMElement::class, $label);

        $firstId = $this->findInXML($result, 'place', 'id');

        $this->assertNotFalse($firstId);
    }

    public function testTicketOfficesClient()
    {
        $result = $this->ticketOfficesClient->get();

        $first = $this->findInXML($result, 'ticketOffice');

        $this->assertInstanceOf(DOMElement::class, $first);

        $label = $this->findInXML($result, 'label');

        $this->assertInstanceOf(DOMElement::class, $label);

        $firstId = $this->findInXML($result, 'ticketOffice', 'id');

        $this->assertNotFalse($firstId);
    }
}

