<?php
namespace PredictHQ\AddressFormatter\AbbreviationsTest;

use PredictHQ\AddressFormatter\Formatter;

class AddressObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testAbbreviateAvenue()
    {
        $address = [
          'country_code' => 'US',
          'house_number' => '301',
          'road' => 'Hamilton Avenue',
          'neighbourhood' => 'Crescent Park',
          'city' => 'Palo Alto',
          'postcode' => '94303',
          'county' => 'Santa Clara County',
          'state' => 'California',
          'country' => 'United States',
        ];

        $expected = '301 Hamilton Ave
Palo Alto, CA 94303
United States of America
';

        $f = new Formatter();
        $actual = $f->formatArray($address, ['abbreviate' => true]);

        $this->assertSame($expected, $actual);
    }

    public function testAbbreviateRoad()
    {
        $address = [
          'country_code' => 'US',
          'house_number' => '301',
          'road' => 'Northwestern University Road',
          'neighbourhood' => 'Crescent Park',
          'city' => 'Palo Alto',
          'postcode' => '94303',
          'county' => 'Santa Clara County',
          'state' => 'California',
          'country' => 'United States',
        ];

        $expected = '301 Northwestern University Rd
Palo Alto, CA 94303
United States of America
';

        $f = new Formatter();
        $actual = $f->formatArray($address, ['abbreviate' => true]);

        $this->assertSame($expected, $actual);
    }

    public function testAbbreviateCanada()
    {
        $address = [
          'city' => 'Vancouver',
          'country' => 'Canada',
          'country_code' => 'ca',
          'county' => 'Greater Vancouver Regional District',
          'postcode' => 'V6K',
          'road' => 'Cornwall Avenue',
          'state' => 'British Columbia',
          'suburb' => 'Kitsilano',
        ];

        $expected = 'Cornwall Ave
Vancouver, BC V6K
Canada
';

        $f = new Formatter();
        $actual = $f->formatArray($address, ['abbreviate' => true]);

        $this->assertSame($expected, $actual);
    }

    public function testAbbreviateSpain()
    {
        $address = [
          'city' => 'Barcelona',
          'city_district' => 'Sarrià - Sant Gervasi',
          'country' => 'Spain',
          'country_code' => 'es',
          'county' => 'BCN',
          'house_number' => '68',
          'neighbourhood' => 'Sant Gervasi',
          'postcode' => '08017',
          'road' => 'Carrer de Calatrava',
          'state' => 'Catalonia',
          'suburb' => 'les Tres Torres',
        ];

        $expected = 'C Calatrava, 68
08017 Barcelona
Spain
';

        $f = new Formatter();
        $actual = $f->formatArray($address, ['abbreviate' => true]);

        $this->assertSame($expected, $actual);
    }
}
