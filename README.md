![tenolo](https://tenolo.de/themes/486/img/tenolo_werbeagentur_bochum.png)

[![Latest Stable Version](https://img.shields.io/packagist/php-v/tenolo/bank-account.svg)](https://packagist.org/packages/tenolo/bank-account)
[![Latest Stable Version](https://poser.pugx.org/tenolo/bank-account/version)](https://packagist.org/packages/tenolo/bank-account)
[![Total Downloads](https://poser.pugx.org/tenolo/bank-account/downloads)](https://packagist.org/packages/tenolo/bank-account)
[![Monthly Downloads](https://poser.pugx.org/tenolo/bank-account/d/monthly)](https://packagist.org/packages/tenolo/bank-account)
[![Latest Unstable Version](https://poser.pugx.org/tenolo/bank-account/v/unstable)](https://packagist.org/packages/tenolo/bank-account)
[![License](https://poser.pugx.org/tenolo/bank-account/license)](https://packagist.org/packages/tenolo/bank-account)

# Bank-Account-Bibliothek (PHP 5.6.+)

Die Bank-Account-Bibliothek bietet hilfreiche Klassen z.B zur Validierung, Generierung und Interpretation
von IBANs.

## IBAN

Mit Hilfe der IBAN-Klasse kann die Länge, der Ländercode und die Prüfsumme einer übergebenen IBAN
validiert werden. Desweiteren kann aus einer IBAN die Bankleitzahl und Kontonummer ermittelt werden.

Im aktuellen Stand können IBANs der folgenden Länder interpretiert werden:

|       |   Länder |
|-------|--- |
| **A** | Albanien, Andorra, Angola, Aserbaidschan |
| **B** | Bahrain, Belgien, Bosnien und Herzegowina, Brasilien, Bulgarien |
| **D** | Dänemark, Deutschland, Dominikanische Republik |
| **E** | Estland |
| **F** | Färöer, Finnland, Frankreich<sup>1</sup> |
| **G** | Gabun, Georgien, Gibraltar, Griechenland, Grönland, Guatemala |
| **I** | Irland, Israel, Italien |
| **J** | Jordanien |
| **K** | Kasachstan, Katar, Kosovo, Kroatien, Kuwait |
| **L** | Lettland, Libanon, Liechtenstein, Litauen, Luxemburg |
| **M** | Malta, Mauretanien, Mauritius, Mazedonien, Moldau, Monaco, Montenegro |
| **N** | Niederlande, Norwegen |
| **O** | Österreich, Osttimor |
| **P** | Pakistan, Polen, Portugal |
| **R** | Rumänien |
| **S** | San Marino, São Tomé und Príncipe, Saudi-Arabien, Schweden, Schweiz, Serbien, Slowakei, Slowenien, Spanien |
| **T** | Tschechien, Tunesien, Türkei |
| **U** | Ungarn |
| **V** | Vereinigte Arabische Emirate, Vereinigtes Königreich<sup>2</sup> |
| **Z** | Zypern |

1) inkl. Französisch-Guayana, Französisch-Polynesien, Französische Süd- und Antarktisgebiete, Guadeloupe, Martinique,
Réunion, Mayotte, Neukaledonien, Saint-Barthélemy, Saint-Martin, Saint-Pierre und Miquelon, Wallis und Futuna

2) inkl. Jersey, Guernsey, Isle of Man

### Beispiel
```php
$iban = new Tenolo\BankAccount\IBAN('DE57 3704 0044 0532 0130 00');

// Prüft ob Ländercode, Länge und Prüfsumme der IBAN valide sind.
// Ist die IBAN nicht valide, gibt die getValidationErrors() Funktion
// die entsprechenden Fehlermeldungen als array zurück.
if (! $iban->isValid()) {
    foreach($iban->getValidationErrors() as $error) {
        echo $error;
    }
}

// Gibt die "maschinenlesbare" IBAN zurück.
$iban->getIban(); // "DE57370400440532013000"

// Gibt die formatierte/normalisierte IBAN zurück.
$iban->getIban(true); // "DE57 3704 0044 0532 0130 00"

// Gibt den 2-stelligen Alpha-Ländercode der IBAN zurück.
$iban->getCountryCode(); // "DE"

// Gibt den 4-stelligen numerischen Ländercode der IBAN zurück.
$iban->getNumericCountryCode; // "1314"

// Gibt die 2-stellige numerische Prüfziffer der IBAN zurück
$iban->getCheckDigits(); // "57"

// Gibt die Bankleitzahl (entsprechend dem Länder-Bankleitzahlenverzeichnis) zurück.
$iban->getBankIdentifier(); // "37040044"

// Gibt die Kunden-Kontonummer (ggf. mit vorangestellten Nullen) zurück.
$iban->getAccountNumber(); // "0532013000"
```
