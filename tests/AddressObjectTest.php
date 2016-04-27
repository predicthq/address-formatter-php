<?php
namespace PredictHQ\AddressFormatter\Test;

use PredictHQ\AddressFormatter\Address;

class AddressObjectTest extends \PHPUnit_Framework_TestCase
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

    public function testAddressObjectAttention()
    {
        $a = new Address();
        $a->setAttention('Beehive')
          ->setCity('Wellington')
          ->setCountry('New Zealand')
          ->setCountryCode('NZ')
          ->setCounty('Wellington City')
          ->setPostcode(6011)
          ->setRoad('Molesworth St')
          ->setState('Wellington')
          ->setSuburb('Pipitea');

        $expected = 'Beehive
Molesworth St
Pipitea
Wellington 6011
New Zealand
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectHouse()
    {
        $a = new Address();
        $a->setHouse('Beehive')
          ->setCity('Wellington')
          ->setCountry('New Zealand')
          ->setCountryCode('NZ')
          ->setCounty('Wellington City')
          ->setPostcode(6011)
          ->setRoad('Molesworth St')
          ->setState('Wellington')
          ->setSuburb('Pipitea');

        $expected = 'Beehive
Molesworth St
Pipitea
Wellington 6011
New Zealand
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectVillage()
    {
        $a = new Address();
        $a->setHouse('Executive Office Building (American Samoa Government)')
          ->setCountry('American Samoa')
          ->setCountryCode('as')
          ->setCounty('Ituau')
          ->setPostcode(96799)
          ->setRoad('Route 001')
          ->setVillage('Faganeanea');

        $expected = 'Executive Office Building (American Samoa Government)
Route 001
Faganeanea, AS 96799
United States of America
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectStateDistrict()
    {
        $a = new Address();
        $a->setCountry('Bosnia and Herzegovina')
          ->setCountryCode('ba')
          ->setCity('Sarajevo')
          ->setCounty('New Sarajevo municipality')
          ->setHouseNumber(88)
          ->setHouse('BH Posta')
          ->setRoad('Zmaja od Bosne')
          ->setPostcode(71000)
          ->setSuburb('Grbavica')
          ->setState('Entity Federation of Bosnia and Herzegovina')
          ->setStateDistrict('Sarajevo Canton');

        $expected = 'BH Posta
Zmaja od Bosne 88
71000 Sarajevo
Bosnia and Herzegovina
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectRegion()
    {
        $a = new Address();
        $a->setAttention('Khorsheed Optician')
          ->setCountry('Palestine')
          ->setCountryCode('ps')
          ->setCity('Gaza')
          ->setRegion('Gaza Strip')
          ->setRoad('Omar Al-Mukhtar St.')
          ->setPostcode('00972')
          ->setSuburb('Saknat az Zarqa')
          ->setStateDistrict('Gaza Governorate');

        $expected = 'Khorsheed Optician
Omar Al-Mukhtar St.
00972 Gaza
Palestine
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectIsland()
    {
        $a = new Address();
        $a->setCountry('United States Minor Outlying Islands')
          ->setCountryCode('um')
          ->setIsland('Wake Island');

        $expected = 'US Minor Outlying Islands
United States of America
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectIsland2()
    {
        $a = new Address();
        $a->setHouse('Government of the BVI')
          ->setCountry('British Virgin Islands')
          ->setCountryCode('vg')
          ->setHouseNumber(33)
          ->setIsland('Tortola')
          ->setPostcode('VG1110')
          ->setRoad('Admin Drive')
          ->setCity('Road Town');

        $expected = 'Government of the BVI
33 Admin Drive
Road Town, Tortola
British Virgin Islands, VG1110
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }

    public function testAddressObjectContinent()
    {
        $a = new Address();
        $a->setHouse('Oil Separator Building')
          ->setContinent('Antarctica')
          ->setCountry('Antarctica')
          ->setCountryCode('aq')
          ->setHouseNumber(72)
          ->setRoad('McMurdo Roads')
          ->setCity('McMurdo Station');

        $expected = 'Oil Separator Building
McMurdo Station
Antarctica
';

        $actual = $a->format();

        $this->assertSame($expected, $actual);
    }
}
