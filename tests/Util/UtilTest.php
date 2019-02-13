<?php

namespace Tests\Util;

use PHPUnit\Framework\TestCase;
use Spyrit\Billetel\Facade\HolderFacade;
use Spyrit\Billetel\Util\Util;

class UtilTest extends TestCase
{
    public function testGetArrayFromObject()
    {
        $holder = new HolderFacade();
        $holder->lastName = 'LastName';
        $holder->firstName = 'FirstName';

        $result = Util::getArrayFromObject($holder);
        $expectedResult = [
            'lastName' => 'LastName',
            'firstName' => 'FirstName',
        ];

        $this->assertEquals($expectedResult, $result);
    }
}