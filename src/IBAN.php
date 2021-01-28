<?php

namespace Tenolo\BankAccount;

use PHP_IBAN\IBANCountry;
use PHP_IBAN\IBAN as BaseIBAN;

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
    protected $validationErrors = [];

    /**
     * @var array
     *
     * @see https://de.wikipedia.org/wiki/IBAN
     */
    protected static $config = [
        'AD' => [ // Andorra
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 12, 'length' => 12],
        ],
        'AE' => [ // United Arab Emirates
            'iban_length'     => 23,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 16],
        ],
        'AL' => [ // Albania
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 12, 'length' => 16],
        ],
        'AO' => [ // Angola
            'iban_length'     => 25,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 12, 'length' => 11],
        ],
        'AT' => [ // Austria
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 9, 'length' => 11],
        ],
        'AZ' => [ // Azerbaijan
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 20],
        ],
        'BA' => [ // Bosnia and Herzegovina
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 10, 'length' => 8],
        ],
        'BE' => [ // Belgium
            'iban_length'     => 16,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 7],
        ],
        'BG' => [ // Bulgaria
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 14, 'length' => 8],
        ],
        'BH' => [ // Bahrain
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 14],
        ],
        'BR' => [ // Brazil
            'iban_length'     => 29,
            'bank_identifier' => ['start' => 4, 'length' => 8],
            'account_number'  => ['start' => 17, 'length' => 10],
        ],
        'CH' => [ // Switzerland
            'iban_length'     => 21,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 9, 'length' => 12],
        ],
        'CY' => [ // Cyprus
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 12, 'length' => 16],
        ],
        'CZ' => [ // Czech Republic
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 16],
        ],
        'DE' => [ // Germany
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 8],
            'account_number'  => ['start' => 12, 'length' => 10],
        ],
        'DK' => [ // Denmark
            'iban_length'     => 18,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 9],
        ],
        'DO' => [ // Dominican Republic
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 20],
        ],
        'EE' => [ // Estonia
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 2],
            'account_number'  => ['start' => 6, 'length' => 13],
        ],
        'ES' => [ // Spain
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 14, 'length' => 10],
        ],
        'FI' => [ // Finland
            'iban_length'     => 18,
            'bank_identifier' => ['start' => 4, 'length' => 6],
            'account_number'  => ['start' => 10, 'length' => 7],
        ],
        'FO' => [ // Faroe Islands
            'iban_length'     => 18,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 9],
        ],
        'FR' => [ // France
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 14, 'length' => 11],
        ],
        'GA' => [ // Gabon
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 14, 'length' => 11],
        ],
        'GB' => [ // United Kingdom
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 14, 'length' => 8],
        ],
        'GE' => [ // Georgia
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 2],
            'account_number'  => ['start' => 6, 'length' => 16],
        ],
        'GI' => [ // Gibraltar
            'iban_length'     => 23,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 15],
        ],
        'GL' => [ // Greenland
            'iban_length'     => 18,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 9],
        ],
        'GR' => [ // Greece
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 11, 'length' => 16],
        ],
        'GT' => [ // Guatemala
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 12, 'length' => 16],
        ],
        'HR' => [ // Croatia
            'iban_length'     => 21,
            'bank_identifier' => ['start' => 4, 'length' => 7],
            'account_number'  => ['start' => 11, 'length' => 10],
        ],
        'HU' => [ // Hungary
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 12, 'length' => 15],
        ],
        'IE' => [ // Ireland
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 14, 'length' => 8],
        ],
        'IL' => [ // Israel
            'iban_length'     => 23,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 10, 'length' => 13],
        ],
        'IT' => [ // Italy
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 5, 'length' => 5],
            'account_number'  => ['start' => 15, 'length' => 12],
        ],
        'JO' => [ // Jordan
            'iban_length'     => 30,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 12, 'length' => 18],
        ],
        'KW' => [ // Kuwait
            'iban_length'     => 30,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 22],
        ],
        'KZ' => [ // Kazakhstan
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 13],
        ],
        'LB' => [ // Lebanon
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 20],
        ],
        'LI' => [ // Liechtenstein
            'iban_length'     => 21,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 9, 'length' => 12],
        ],
        'LT' => [ // Lithuania
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 9, 'length' => 11],
        ],
        'LU' => [ // Luxembourg
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 13],
        ],
        'LV' => [ // Latvia
            'iban_length'     => 21,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 13],
        ],
        'MC' => [ // Monaco
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 14, 'length' => 11],
        ],
        'MD' => [ // Moldova
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 2],
            'account_number'  => ['start' => 6, 'length' => 18],
        ],
        'ME' => [ // Montenegro
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 13],
        ],
        'MK' => [ // Macedonia
            'iban_length'     => 19,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 10],
        ],
        'MR' => [ // Mauritania
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 14, 'length' => 11],
        ],
        'MT' => [ // Malta
            'iban_length'     => 31,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 13, 'length' => 18],
        ],
        'MU' => [ // Mauritius
            'iban_length'     => 30,
            'bank_identifier' => ['start' => 4, 'length' => 6],
            'account_number'  => ['start' => 12, 'length' => 15],
        ],
        'NL' => [ // Netherlands
            'iban_length'     => 18,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 10],
        ],
        'NO' => [ // Norway
            'iban_length'     => 15,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 6],
        ],
        'PK' => [ // Pakistan
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 10, 'length' => 14],
        ],
        'PL' => [ // Poland
            'iban_length'     => 28,
            'bank_identifier' => ['start' => 4, 'length' => 8],
            'account_number'  => ['start' => 12, 'length' => 16],
        ],
        'PT' => [ // Portugal
            'iban_length'     => 25,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 12, 'length' => 11],
        ],
        'QA' => [ // Quatar
            'iban_length'     => 29,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 21],
        ],
        'RO' => [ // Romania
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 16],
        ],
        'RS' => [ // Serbia
            'iban_length'     => 22,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 13],
        ],
        'SA' => [ // Saudi Arabia
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 2],
            'account_number'  => ['start' => 6, 'length' => 18],
        ],
        'SE' => [ // Sweden
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 16],
        ],
        'SI' => [ // Slovenia
            'iban_length'     => 19,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 9, 'length' => 8],
        ],
        'SK' => [ // Slovak Republic
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 8, 'length' => 16],
        ],
        'SM' => [ // San Marino
            'iban_length'     => 27,
            'bank_identifier' => ['start' => 5, 'length' => 5],
            'account_number'  => ['start' => 15, 'length' => 12],
        ],
        'ST' => [ // Sao Tome and Principe
            'iban_length'     => 25,
            'bank_identifier' => ['start' => 4, 'length' => 4],
            'account_number'  => ['start' => 12, 'length' => 11],
        ],
        'TL' => [ // Timor leste
            'iban_length'     => 23,
            'bank_identifier' => ['start' => 4, 'length' => 3],
            'account_number'  => ['start' => 7, 'length' => 14],
        ],
        'TN' => [ // Tunisia
            'iban_length'     => 24,
            'bank_identifier' => ['start' => 4, 'length' => 2],
            'account_number'  => ['start' => 9, 'length' => 13],
        ],
        'TR' => [ // Turkey
            'iban_length'     => 26,
            'bank_identifier' => ['start' => 4, 'length' => 5],
            'account_number'  => ['start' => 10, 'length' => 16],
        ],
        'XK' => [ // Kosovo
            'iban_length'     => 20,
            'bank_identifier' => ['start' => 4, 'length' => 2],
            'account_number'  => ['start' => 8, 'length' => 10],
        ],
    ];

    /**
     * @param null $iban
     *
     * @return IBAN
     */
    public static function create($iban = null)
    {
        return new static($iban);
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
        $invertedIban = $numericAccountIdentification.$this->getNumericCountryCode().$this->getCheckDigits();

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
                $a = (int)$mod.substr($leftOperand, 0, $take);
                $leftOperand = substr($leftOperand, $take);
                $mod = $a % $modulus;
            } while (strlen($leftOperand));

            return (string)$mod;
        }

        return bcmod($leftOperand, $modulus);
    }
}

