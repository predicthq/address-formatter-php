<?php

use PredictHQ\AddressFormatter\Formatter;
use Symfony\Component\Yaml\Yaml;

class TestCasesTest extends PHPUnit_Framework_TestCase
{
    public function testCountries()
    {
        //Load all countries
        $testCasesPath = implode(DIRECTORY_SEPARATOR, array(realpath(dirname(__FILE__)), 'testcases'));
        $countriesPath = implode(DIRECTORY_SEPARATOR, array($testCasesPath, 'countries', '*.yaml'));
        $othersPath = implode(DIRECTORY_SEPARATOR, array($testCasesPath, 'other', '*.yaml'));

        $testData = [];

        foreach (glob($countriesPath) as $path) {
            $yamlDocs = explode('---', file_get_contents($path));

            foreach ($yamlDocs as $doc) {
                $data = Yaml::parse($doc);

                if (is_array($data) && count($data) > 0) {
                    $testData[] = $data;
                }
            }
        }

        foreach (glob($othersPath) as $path) {
            $yamlDocs = explode('---', file_get_contents($path));

            foreach ($yamlDocs as $doc) {
                $data = Yaml::parse($doc);

                if (is_array($data) && count($data) > 0) {
                    $testData[] = $data;
                }
            }
        }

        foreach ($testData as $key => $val) {
            $f = new Formatter();
            $text = $f->formatArray($val['components']);

            $this->assertSame($val['expected'], $text, $val['description']);
        }
    }
}
