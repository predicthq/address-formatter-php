<?php

use PredictHQ\AddressFormatter\Address;

class AddressObjectTest extends PHPUnit_Framework_TestCase
{
    public function testAddressObject()
    {
        $a = new Address();
        $a->setCity('Wellington')
          ->setCountry('New Zealand')
          ->setCountryCode('NZ')
          ->setCounty('Wellington City')
          ->setHouseNumber(53)
          ->setPostcode(6011)
          ->setRoad('Pirie Street')
          ->setState('Wellington')
          ->setSuburb('Mount Victoria');

        $expected = '53 Pirie Street
Mount Victoria
Wellington 6011
New Zealand
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }
}
