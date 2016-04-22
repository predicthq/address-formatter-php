<?php
namespace PredictHQ\AddressFormatter;

use Symfony\Component\Yaml\Yaml;

/**
 * Format an address based on the country template.
 *
 * Takes advantage of the OpenCageData address-formatting templates available at:
 * @link https://github.com/OpenCageData/address-formatting
 *
 * Currently using address templates version:
 * @link https://github.com/OpenCageData/address-formatting/commit/2cecd583ec6563c5d1372d5e16db9cbe4c26aa25
 *
 * Also inspired by the Perl address formatter using the same address templates:
 * @link https://metacpan.org/pod/Geo::Address::Formatter
 */
class AddressFormatter
{
    public function __construct()
    {

    }

    public function loadTemplates()
    {
        //$yaml = Yaml::parse(file_get_contents('/path/to/file.yml'));

        return true;
    }
}
