<?php
namespace PredictHQ\AddressFormatter\Test;

use PredictHQ\AddressFormatter\Formatter;

class ArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testAddressArray()
    {
        $address = [
          'city' => 'Wellington',
          'country' => 'New Zealand',
          'country_code' => 'NZ',
          'county' => 'Wellington City',
          'house_number' => 53,
          'postcode' => 6011,
          'road' => 'Pirie Street',
          'state' => 'Wellington',
          'suburb' => 'Mount Victoria',
        ];

        $expected = '53 Pirie Street
Mount Victoria
Wellington 6011
New Zealand
';

        $f = new Formatter();
        $actual = $f->formatArray($address);

        $this->assertSame($expected, $actual);
    }
}
