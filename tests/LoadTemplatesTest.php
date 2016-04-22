<?php

use PredictHQ\AddressFormatter\AddressFormatter;

class LoadTemplatesTest extends PHPUnit_Framework_TestCase
{
    public function testLoadTemplates()
    {
        $af = new AddressFormatter();
        $this->assertTrue($af->loadTemplates());
    }
}
