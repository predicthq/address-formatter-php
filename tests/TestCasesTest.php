<?php
namespace PredictHQ\AddressFormatter\Test;

use PredictHQ\AddressFormatter\Formatter;
use Symfony\Component\Yaml\Yaml;

class TestCasesTest extends \PHPUnit_Framework_TestCase
{
    public function testCountries()
    {
        /**
         * Unfortunately it's not possible to include a git submodule with a composer package, so we load
         * the address-formatting templates as a separate package via our composer.json and if the address-formatting
         * templates exist at the expected location for a composer loaded package, we use that by default.
         */
        $composerTestCasesPath = implode(DIRECTORY_SEPARATOR, array(realpath(dirname(__FILE__)), '..', '..', 'address-formatter-templates', 'testcases'));

        if (is_dir($composerTestCasesPath)) {
            $testCasesPath = $composerTestCasesPath;
        } else {
            //Use the git submodule path
            $testCasesPath = implode(DIRECTORY_SEPARATOR, array(realpath(dirname(__FILE__)), '..', 'address-formatter-templates', 'testcases'));
        }

        //Load all countries
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

        $f = new Formatter();

        foreach ($testData as $key => $val) {
            $text = $f->formatArray($val['components']);

            $this->assertSame($val['expected'], $text, $val['description']);
        }
    }
}
