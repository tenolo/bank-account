<?php

namespace Tenolo\BankAccount;

use \IBAN as BaseIBAN;

/**
 * @package   Tenolo\BankAccount
 * @author    Christopher Christen <c.christen@tenolo.de>, Nikita Loges <n.loges@tenolo.de>
 * @copyright Copyright (c) 2018 tenolo GbR
 */
class IBAN extends BaseIBAN
{

    /**
     * @var string
     */
    protected $iban;

    /**
     * @var array
     */
    protected $validationErrors = array();

    /**
     * @var array
     *
     * @see https://de.wikipedia.org/wiki/IBAN
     */
    protected static $config = array(
        'AD' => array( // Andorra
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 12, 'length' => 12),
        ),
        'AE' => array( // United Arab Emirates
            'iban_length' => 23,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 16),
        ),
        'AL' => array( // Albania
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 12, 'length' => 16),
        ),
        'AO' => array( // Angola
            'iban_length' => 25,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 12, 'length' => 11),
        ),
        'AT' => array( // Austria
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 9, 'length' => 11),
        ),
        'AZ' => array( // Azerbaijan
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 20),
        ),
        'BA' => array( // Bosnia and Herzegovina
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 10, 'length' => 8),
        ),
        'BE' => array( // Belgium
            'iban_length' => 16,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 7),
        ),
        'BG' => array( // Bulgaria
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 14, 'length' => 8),
        ),
        'BH' => array( // Bahrain
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 14),
        ),
        'BR' => array( // Brazil
            'iban_length' => 29,
            'bank_identifier' => array('start' => 4, 'length' => 8),
            'account_number' => array('start' => 17, 'length' => 10),
        ),
        'CH' => array( // Switzerland
            'iban_length' => 21,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 9, 'length' => 12),
        ),
        'CY' => array( // Cyprus
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 12, 'length' => 16),
        ),
        'CZ' => array( // Czech Republic
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 16),
        ),
        'DE' => array( // Germany
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 8),
            'account_number' => array('start' => 12, 'length' => 10),
        ),
        'DK' => array( // Denmark
            'iban_length' => 18,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 9),
        ),
        'DO' => array( // Dominican Republic
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 20),
        ),
        'EE' => array( // Estonia
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 2),
            'account_number' => array('start' => 6, 'length' => 13),
        ),
        'ES' => array( // Spain
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 14, 'length' => 10),
        ),
        'FI' => array( // Finland
            'iban_length' => 18,
            'bank_identifier' => array('start' => 4, 'length' => 6),
            'account_number' => array('start' => 10, 'length' => 7),
        ),
        'FO' => array( // Faroe Islands
            'iban_length' => 18,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 9),
        ),
        'FR' => array( // France
            'iban_length' => 27,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 14, 'length' => 11),
        ),
        'GA' => array( // Gabon
            'iban_length' => 27,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 14, 'length' => 11),
        ),
        'GB' => array( // United Kingdom
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 14, 'length' => 8),
        ),
        'GE' => array( // Georgia
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 2),
            'account_number' => array('start' => 6, 'length' => 16),
        ),
        'GI' => array( // Gibraltar
            'iban_length' => 23,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 15),
        ),
        'GL' => array( // Greenland
            'iban_length' => 18,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 9),
        ),
        'GR' => array( // Greece
            'iban_length' => 27,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 11, 'length' => 16),
        ),
        'GT' => array( // Guatemala
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 12, 'length' => 16),
        ),
        'HR' => array( // Croatia
            'iban_length' => 21,
            'bank_identifier' => array('start' => 4, 'length' => 7),
            'account_number' => array('start' => 11, 'length' => 10),
        ),
        'HU' => array( // Hungary
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 12, 'length' => 15),
        ),
        'IE' => array( // Ireland
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 14, 'length' => 8),
        ),
        'IL' => array( // Israel
            'iban_length' => 23,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 10, 'length' => 13),
        ),
        'IT' => array( // Italy
            'iban_length' => 27,
            'bank_identifier' => array('start' => 5, 'length' => 5),
            'account_number' => array('start' => 15, 'length' => 12),
        ),
        'JO' => array( // Jordan
            'iban_length' => 30,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 12, 'length' => 18),
        ),
        'KW' => array( // Kuwait
            'iban_length' => 30,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 22),
        ),
        'KZ' => array( // Kazakhstan
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 13),
        ),
        'LB' => array( // Lebanon
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 20),
        ),
        'LI' => array( // Liechtenstein
            'iban_length' => 21,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 9, 'length' => 12),
        ),
        'LT' => array( // Lithuania
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 9, 'length' => 11),
        ),
        'LU' => array( // Luxembourg
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 13),
        ),
        'LV' => array( // Latvia
            'iban_length' => 21,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 13),
        ),
        'MC' => array( // Monaco
            'iban_length' => 27,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 14, 'length' => 11),
        ),
        'MD' => array( // Moldova
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 2),
            'account_number' => array('start' => 6, 'length' => 18),
        ),
        'ME' => array( // Montenegro
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 13),
        ),
        'MK' => array( // Macedonia
            'iban_length' => 19,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 10),
        ),
        'MR' => array( // Mauritania
            'iban_length' => 27,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 14, 'length' => 11),
        ),
        'MT' => array( // Malta
            'iban_length' => 31,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 13, 'length' => 18),
        ),
        'MU' => array( // Mauritius
            'iban_length' => 30,
            'bank_identifier' => array('start' => 4, 'length' => 6),
            'account_number' => array('start' => 12, 'length' => 15),
        ),
        'NL' => array( // Netherlands
            'iban_length' => 18,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 10),
        ),
        'NO' => array( // Norway
            'iban_length' => 15,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 6),
        ),
        'PK' => array( // Pakistan
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 10, 'length' => 14),
        ),
        'PL' => array( // Poland
            'iban_length' => 28,
            'bank_identifier' => array('start' => 4, 'length' => 8),
            'account_number' => array('start' => 12, 'length' => 16),
        ),
        'PT' => array( // Portugal
            'iban_length' => 25,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 12, 'length' => 11),
        ),
        'QA' => array( // Quatar
            'iban_length' => 29,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 21),
        ),
        'RO' => array( // Romania
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 16),
        ),
        'RS' => array( // Serbia
            'iban_length' => 22,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 13),
        ),
        'SA' => array( // Saudi Arabia
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 2),
            'account_number' => array('start' => 6, 'length' => 18),
        ),
        'SE' => array( // Sweden
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 16),
        ),
        'SI' => array( // Slovenia
            'iban_length' => 19,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 9, 'length' => 8),
        ),
        'SK' => array( // Slovak Republic
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 8, 'length' => 16),
        ),
        'SM' => array( // San Marino
            'iban_length' => 27,
            'bank_identifier' => array('start' => 5, 'length' => 5),
            'account_number' => array('start' => 15, 'length' => 12),
        ),
        'ST' => array( // Sao Tome and Principe
            'iban_length' => 25,
            'bank_identifier' => array('start' => 4, 'length' => 4),
            'account_number' => array('start' => 12, 'length' => 11),
        ),
        'TL' => array( // Timor leste
            'iban_length' => 23,
            'bank_identifier' => array('start' => 4, 'length' => 3),
            'account_number' => array('start' => 7, 'length' => 14),
        ),
        'TN' => array( // Tunisia
            'iban_length' => 24,
            'bank_identifier' => array('start' => 4, 'length' => 2),
            'account_number' => array('start' => 9, 'length' => 13),
        ),
        'TR' => array( // Turkey
            'iban_length' => 26,
            'bank_identifier' => array('start' => 4, 'length' => 5),
            'account_number' => array('start' => 10, 'length' => 16),
        ),
        'XK' => array( // Kosovo
            'iban_length' => 20,
            'bank_identifier' => array('start' => 4, 'length' => 2),
            'account_number' => array('start' => 8, 'length' => 10),
        ),
    );

    /**
     * @param null $iban
     *
     * @return IBAN
     */
    public static function create($iban = null)
    {
        return new self($iban);
    }

    /**
     * Return the normalized IBAN.
     *
     * @param bool $formatted
     *
     * @return mixed|string
     */
    public function getIban($formatted = false)
    {
        if ($formatted) {
            return $this->HumanFormat();
        }

        return $this->MachineFormat();
    }

    /**
     * Determine whether the given IBAN is valid.
     *
     * @return bool
     */
    public function isValid()
    {
        $countryCode = $this->getCountryCode();
        $numericAccountIdentification = $this->getNumericRepresentation(substr($this->iban, 4));
        $invertedIban = $numericAccountIdentification . $this->getNumericCountryCode() . $this->getCheckDigits();

        if (!isset(static::$config[$countryCode])) {
            $this->validationErrors[] = 'Invalid IBAN country code';
        } elseif (strlen($this->iban) !== self::$config[$countryCode]['iban_length']) {
            $this->validationErrors[] = 'Invalid IBAN length';
        } elseif ($this->bcmod($invertedIban, 97) !== '1') {
            $this->validationErrors[] = 'Invalid IBAN checksum';
        } else {
            return true;
        }

        return false;
    }

    /**
     * Return the validation errors.
     *
     * @return array
     */
    public function getValidationErrors()
    {
        return $this->validationErrors;
    }

    /**
     * @return \IBANCountry
     */
    public function getIBANCountry()
    {
        return new \IBANCountry($this->getCountryCode());
    }

    /**
     * Return the alpha country code.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->Country();
    }

    /**
     * Return the numeric country code.
     *
     * @return string
     */
    public function getNumericCountryCode()
    {
        $countryCode = $this->getCountryCode();

        return $this->getNumericRepresentation($countryCode);
    }

    /**
     * Return the check digits.
     *
     * @return string
     */
    public function getCheckDigits()
    {
        return substr($this->iban, 2, 2);
    }

    /**
     * Return the bank identifier number.
     *
     * @return string
     */
    public function getBankIdentifier()
    {
        return $this->Bank();
    }

    /**
     * Return the account number.
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->Account();
    }

    /**
     * Get the numeric representation of a letter string.
     *
     * @param string $letterRepresentation
     *
     * @return string
     */
    protected function getNumericRepresentation($letterRepresentation)
    {
        $numericRepresentation = '';

        foreach (str_split($letterRepresentation) as $char) {
            $ord = ord($char);

            if ($ord >= 65 && $ord <= 90) {
                $numericRepresentation .= ($ord - 55);
            } elseif ($ord >= 48 && $ord <= 57) {
                $numericRepresentation .= ($ord - 48);
            }
        }

        return $numericRepresentation;
    }

    /**
     * Get modulus of an arbitrary precision number.
     *
     * @see http://php.net/manual/de/function.bcmod.php#38474
     *
     * @param mixed $leftOperand
     * @param mixed $modulus
     *
     * @return string
     */
    protected function bcmod($leftOperand, $modulus)
    {
        if (!function_exists('bcmod')) {
            $take = 5;
            $mod = '';

            do {
                $a = (int)$mod . substr($leftOperand, 0, $take);
                $leftOperand = substr($leftOperand, $take);
                $mod = $a % $modulus;
            } while (strlen($leftOperand));

            return (string)$mod;
        }

        return bcmod($leftOperand, $modulus);
    }
}
