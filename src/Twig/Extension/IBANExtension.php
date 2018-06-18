<?php

namespace Tenolo\BankAccount\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class IBANExtension
 *
 * @package Tenolo\BankAccount\Twig\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class IBANExtension extends AbstractExtension
{

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('verify_iban', 'verify_iban'),
            new TwigFunction('iban_mistranscription_suggestions', 'iban_mistranscription_suggestions'),
            new TwigFunction('iban_to_machine_format', 'iban_to_machine_format'),
            new TwigFunction('iban_to_human_format', 'iban_to_human_format'),
            new TwigFunction('iban_get_country_part', 'iban_get_country_part'),
            new TwigFunction('iban_get_checksum_part', 'iban_get_checksum_part'),
            new TwigFunction('iban_get_nationalchecksum_part', 'iban_get_nationalchecksum_part'),
            new TwigFunction('iban_get_bban_part', 'iban_get_bban_part'),
            new TwigFunction('iban_verify_checksum', 'iban_verify_checksum'),
            new TwigFunction('iban_find_checksum', 'iban_find_checksum'),
            new TwigFunction('iban_set_checksum', 'iban_set_checksum'),
            new TwigFunction('iban_checksum_string_replace', 'iban_checksum_string_replace'),
            new TwigFunction('iban_find_nationalchecksum', 'iban_find_nationalchecksum'),
            new TwigFunction('iban_set_nationalchecksum', 'iban_set_nationalchecksum'),
            new TwigFunction('iban_verify_nationalchecksum', 'iban_verify_nationalchecksum'),
            new TwigFunction('iban_get_parts', 'iban_get_parts'),
            new TwigFunction('iban_get_bank_part', 'iban_get_bank_part'),
            new TwigFunction('iban_get_branch_part', 'iban_get_branch_part'),
            new TwigFunction('iban_get_account_part', 'iban_get_account_part'),
            new TwigFunction('iban_countries', 'iban_countries'),
            new TwigFunction('iban_country_get_country_name', 'iban_country_get_country_name'),
            new TwigFunction('iban_country_get_domestic_example', 'iban_country_get_domestic_example'),
            new TwigFunction('iban_country_get_bban_example', 'iban_country_get_bban_example'),
            new TwigFunction('iban_country_get_bban_format_swift', 'iban_country_get_bban_format_swift'),
            new TwigFunction('iban_country_get_bban_format_regex', 'iban_country_get_bban_format_regex'),
            new TwigFunction('iban_country_get_bban_length', 'iban_country_get_bban_length'),
            new TwigFunction('iban_country_get_iban_example', 'iban_country_get_iban_example'),
            new TwigFunction('iban_country_get_iban_format_swift', 'iban_country_get_iban_format_swift'),
            new TwigFunction('iban_country_get_iban_format_regex', 'iban_country_get_iban_format_regex'),
            new TwigFunction('iban_country_get_iban_length', 'iban_country_get_iban_length'),
            new TwigFunction('iban_country_get_bankid_start_offset', 'iban_country_get_bankid_start_offset'),
            new TwigFunction('iban_country_get_bankid_stop_offset', 'iban_country_get_bankid_stop_offset'),
            new TwigFunction('iban_country_get_branchid_start_offset', 'iban_country_get_branchid_start_offset'),
            new TwigFunction('iban_country_get_branchid_stop_offset', 'iban_country_get_branchid_stop_offset'),
            new TwigFunction('iban_country_get_nationalchecksum_start_offset', 'iban_country_get_nationalchecksum_start_offset'),
            new TwigFunction('iban_country_get_nationalchecksum_stop_offset', 'iban_country_get_nationalchecksum_stop_offset'),
            new TwigFunction('iban_country_get_registry_edition', 'iban_country_get_registry_edition'),
            new TwigFunction('iban_country_get_country_swift_official', 'iban_country_get_country_swift_official'),
            new TwigFunction('iban_country_is_sepa', 'iban_country_is_sepa'),
            new TwigFunction('iban_country_get_iana', 'iban_country_get_iana'),
            new TwigFunction('iban_country_get_iso3166', 'iban_country_get_iso3166'),
            new TwigFunction('iban_country_get_parent_registrar', 'iban_country_get_parent_registrar'),
            new TwigFunction('iban_country_get_currency_iso4217', 'iban_country_get_currency_iso4217'),
            new TwigFunction('iban_country_get_central_bank_url', 'iban_country_get_central_bank_url'),
            new TwigFunction('iban_country_get_central_bank_name', 'iban_country_get_central_bank_name'),
        ];
    }

}
