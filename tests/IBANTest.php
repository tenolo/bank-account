<?php

namespace Tenolo\BankAccount\Tests;

use PHPUnit\Framework\TestCase;
use Tenolo\BankAccount\IBAN;

/**
 * @package   Tenolo\BankAccount\Tests
 * @author    Christopher Christen <c.christen@tenolo.de>
 * @copyright Copyright (c) 2018 tenolo GbR
 */
class IBANTest extends TestCase
{

    /**
     * @see http://www.xe.com/ibancalculator/sample/?ibancountry=germany
     *
     * @return array (IBAN | Bank Identifier | Account Number)
     */
    public function ibanDataProvider()
    {
        return array(
            'albania'              => array('AL47 2121 1009 0000 0002 3569 8741', '212', '0000000235698741'),
            'andorra'              => array('AD12 0001 2030 2003 5910 0100', '0001', '200359100100'),
            'angola'               => array('AO06 0044 0000 6729 5030 1010 2', '0044', '67295030101'),
            'austria'              => array('AT61 1904 3002 3457 3201', '19043', '00234573201'),
            'azerbaijan'           => array('AZ21 NABZ 0000 0000 1370 1000 1944', 'NABZ', '00000000137010001944'),
            'bahrain'              => array('BH67 BMAG 0000 1299 1234 56', 'BMAG', '00001299123456'),
            'belgium'              => array('BE68 5390 0754 7034', '539', '0075470'),
            'bosnia_herzegovina'   => array('BA39 1290 0794 0102 8494', '129', '94010284'),
            'brazil'               => array('BR97 0036 0305 0000 1000 9795 493P 1', '00360305', '0009795493'),
            'bulgaria'             => array('BG80 BNBG 9661 1020 3456 78', 'BNBG', '20345678'),
            'croatia'              => array('HR12 1001 0051 8630 0016 0', '1001005', '1863000160'),
            'cyprus'               => array('CY17 0020 0128 0000 0012 0052 7600', '002', '0000001200527600'),
            'czech_republic'       => array('CZ65 0800 0000 1920 0014 5399', '0800', '0000192000145399'),
            'denmark'              => array('DK50 0040 0440 1162 43', '0040', '044011624'),
            'dominican_republic'   => array('DO28 BAGR 0000 0001 2124 5361 1324', 'BAGR', '00000001212453611324'),
            'estonia'              => array('EE38 2200 2210 2014 5685', '22', '22102014568'),
            'faroe_islands'        => array('FO62 6460 0001 6316 34', '6460', '000163163'),
            'finland'              => array('FI21 1234 5600 0007 85', '123456', '0000078'),
            'france'               => array('FR14 2004 1010 0505 0001 3M02 606', '20041', '0500013M026'),
            'gabon'                => array('GA21 4002 1010 0320 0189 0020 126', '40021', '20018900201'),
            'germany'              => array('DE89 3704 0044 0532 0130 00', '37040044', '0532013000'),
            'georgia'              => array('GE29 NB00 0000 0101 9049 17', 'NB', '0000000101904917'),
            'gibraltar'            => array('GI75 NWBK 0000 0000 7099 453', 'NWBK', '000000007099453'),
            'greenland'            => array('GL89 6471 0001 0002 06', '6471', '000100020'),
            'greece'               => array('GR16 0110 1250 0000 0001 2300 695', '011', '0000000012300695'),
            'guatemala'            => array('GT82 TRAJ 0102 0000 0012 1002 9690', 'TRAJ', '0000001210029690'),
            'hungary'              => array('HU42 1177 3016 1111 1018 0000 0000', '117', '111110180000000'),
            'ireland'              => array('IE29 AIBK 9311 5212 3456 78', 'AIBK', '12345678'),
            'israel'               => array('IL62 0108 0000 0009 9999 999', '010', '0000099999999'),
            'italy'                => array('IT60 X054 2811 1010 0000 0123 456', '05428', '000000123456'),
            'jordan'               => array('JO94 CBJO 0010 0000 0000 0131 0003 02', 'CBJO', '000000000131000302'),
            'kazakhstan'           => array('KZ86 125K ZT50 0410 0100', '125', 'KZT5004100100'),
            'kosovo'               => array('XK05 1212 0123 4567 8906', '12', '0123456789'),
            'kuwait'               => array('KW81 CBKU 0000 0000 0000 1234 5601 01', 'CBKU', '0000000000001234560101'),
            'latvia'               => array('LV80 BANK 0000 4351 9500 1', 'BANK', '0000435195001'),
            'lebanon'              => array('LB62 0999 0000 0001 0019 0122 9114', '0999', '00000001001901229114'),
            'liechtenstein'        => array('LI21 0881 0000 2324 013A A', '08810', '0002324013AA'),
            'lithuania'            => array('LT12 1000 0111 0100 1000', '10000', '11101001000'),
            'luxembourg'           => array('LU28 0019 4006 4475 0000', '001', '9400644750000'),
            'makedonia'            => array('MK07 2501 2000 0058 984', '250', '1200000589'),
            'malta'                => array('MT84 MALT 0110 0001 2345 MTLC AST0 01S', 'MALT', '0012345MTLCAST001S'),
            'mauritania'           => array('MR13 0002 0001 0100 0012 3456 753', '00020', '00001234567'),
            'mauritius'            => array('MU17 BOMM 0101 1010 3030 0200 000M UR', 'BOMM01', '101030300200000'),
            'moldova'              => array('MD24 AG00 0225 1000 1310 4168', 'AG', '000225100013104168'),
            'monaco'               => array('MC58 1122 2000 0101 2345 6789 030', '11222', '01234567890'),
            'montenegro'           => array('ME25 5050 0001 2345 6789 51', '505', '0000123456789'),
            'netherlands'          => array('NL91 ABNA 0417 1643 00', 'ABNA', '0417164300'),
            'norway'               => array('NO93 8601 1117 947', '8601', '111794'),
            'pakistan'             => array('PK36 SCBL 0000 0011 2345 6702', 'SCBL', '0000001123456702'),
            'poland'               => array('PL61 1090 1014 0000 0712 1981 2874', '10901014', '0000071219812874'),
            'portugal'             => array('PT50 0002 0123 1234 5678 9015 4', '0002', '12345678901'),
            'quatar'               => array('QA58 DOHB 0000 1234 5678 90AB CDEF G', 'DOHB', '00001234567890ABCDEFG'),
            'romania'              => array('RO49 AAAA 1B31 0075 9384 0000', 'AAAA', '1B31007593840000'),
            'san_marino'           => array('SM86 U032 2509 8000 0000 0270 100', '03225', '000000270100'),
            'sao_tome_principe'    => array('ST68 0001 0001 0051 8453 1011 2', '0001', '00518453101'),
            'saudi_arabia'         => array('SA03 8000 0000 6080 1016 7519', '80', '000000608010167519'),
            'serbia'               => array('RS35 2600 0560 1001 6113 79', '260', '0056010016113'),
            'slovak_republic'      => array('SK31 1200 0000 1987 4263 7541', '1200', '0000198742637541'),
            'slovenia'             => array('SI56 2633 0001 2039 086', '26330', '00120390'),
            'spain'                => array('ES91 2100 0418 4502 0005 1332', '2100', '0200051332'),
            'sweden'               => array('SE45 5000 0000 0583 9825 7466', '500', '0000005839825746'),
            'switzerland'          => array('CH93 0076 2011 6238 5295 7', '00762', '011623852957'),
            'timor_leste'          => array('TL38 0080 0123 4567 8910 157', '008', '00123456789101'),
            'tunisia'              => array('TN59 1000 6035 1835 9847 8831', '10', '0351835984788'),
            'turkey'               => array('TR33 0006 1005 1978 6457 8413 26', '00061', '0519786457841326'),
            'united_arab_emirates' => array('AE07 0331 2345 6789 0123 456', '033', '1234567890123456'),
            'united_kingom'        => array('GB29 NWBK 6016 1331 9268 19', 'NWBK', '31926819'),
        );
    }

    /**
     * @dataProvider ibanDataProvider()
     *
     * @param string $iban
     */
    public function testGetIban($iban)
    {
        $ibanObj = new IBAN($iban);

        $this->assertEquals(str_replace(' ', '', $iban), $ibanObj->getIban());
        $this->assertEquals($iban, $ibanObj->getIban(true));
        $this->assertEquals('DE57370400440532013000', (new IBAN('<?*DE57>3704 00440532 !!0130?? 00'))->getIban());
        $this->assertEquals('DE57 3704 0044 0532 0130 00',
            (new IBAN('<?*DE57>3704 00440532 !!0130?? 00'))->getIban(true));
    }

    /**
     * ------------------------------------------
     *  VALIDATION
     * ------------------------------------------
     */

    /**
     * @dataProvider ibanDataProvider()
     *
     * @param string $iban
     */
    public function testIsValid($iban)
    {
        $this->assertTrue((new IBAN($iban))->isValid());
    }

    public function testInvalidCountryCode()
    {
        $iban = new IBAN('XX');

        $iban->isValid();

        $this->assertEquals('Invalid IBAN country code', $iban->getValidationErrors()[0]);
    }

    public function testInvalidLength()
    {
        $iban = new IBAN('DE');

        $iban->isValid();

        $this->assertEquals('Invalid IBAN length', $iban->getValidationErrors()[0]);
    }

    public function testInvalidChecksum()
    {
        $iban = new IBAN('DE57 3704 0044 0532 0130 00');

        $iban->isValid();

        $this->assertEquals('Invalid IBAN checksum', $iban->getValidationErrors()[0]);
    }

    /**
     * ------------------------------------------
     *  COUNTRY CODE
     * ------------------------------------------
     */

    /**
     * @dataProvider ibanDataProvider()
     *
     * @param string $iban
     */
    public function testGetCountryCode($iban)
    {
        $this->assertEquals(substr($iban, 0, 2), (new IBAN($iban))->getCountryCode());
    }

    public function testGetCountryReturnsUppercaseCountryCode()
    {
        $this->assertEquals('DE', (new IBAN('de57 37040044 0532013000'))->getCountryCode());
    }

    public function testGetNumericCountryCode()
    {
        $this->assertEquals('1314', (new IBAN('DE89 3704 0044 0532 0130 00'))->getNumericCountryCode());
        $this->assertEquals('1029', (new IBAN('AT61 1904 3002 3457 3201'))->getNumericCountryCode());
        $this->assertEquals('3320', (new IBAN('XK05 1212 0123 4567 8906'))->getNumericCountryCode());
    }

    /**
     * ------------------------------------------
     *  CHECK DIGITS
     * ------------------------------------------
     */

    /**
     * @dataProvider ibanDataProvider()
     *
     * @param string $iban
     */
    public function testGetCheckDigits($iban)
    {
        $this->assertEquals(substr($iban, 2, 2), (new IBAN($iban))->getCheckDigits());
    }

    /**
     * ------------------------------------------
     *  BANK IDENTIFIER & ACCOUNT NUMBER
     * ------------------------------------------
     */

    /**
     * @dataProvider ibanDataProvider()
     *
     * @param string $iban
     * @param string $bankIdentifier
     * @param string $accountNumber
     */
    public function testGetBankIdentifierAndAccountNumber($iban, $bankIdentifier, $accountNumber)
    {
        $ibanObj = new IBAN($iban);

        $this->assertEquals($bankIdentifier, $ibanObj->getBankIdentifier());
        $this->assertEquals($accountNumber, $ibanObj->getAccountNumber());
    }
}
