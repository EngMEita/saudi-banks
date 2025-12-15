# meita/saudi-banks

Saudi banks IBAN identifier lookup with English and Arabic names.

The library ships a small, typed dataset of every IBAN bank identifier used in Saudi Arabia, including legacy codes for merged banks. It exposes helpers to list all banks, resolve a bank from a two-digit IBAN identifier, or resolve directly from a full Saudi IBAN string.

## Installation

```bash
composer require meita/saudi-banks
```

## Usage

```php
use Meita\SaudiBanks\Banks;

// Get every bank as value objects
$banks = Banks::all();

// Resolve by the two-digit IBAN identifier (positions 5-6 in SA IBANs)
$rajhi = Banks::findByIbanIdentifier('80');

// Resolve from a full IBAN (spaces are fine)
$fromIban = Banks::findByIban('SA03 8000 0000 6080 1016 7519');

// Export to array for JSON responses
header('Content-Type: application/json');
echo json_encode($fromIban->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
```

## Data dictionary

Each record contains:

- `iban_identifier` — Two-digit IBAN bank identifier (string to preserve leading zeros).
- `english_name` — Formal English name.
- `arabic_name` — Formal Arabic name.
- `short_name` — Common ticker/short name.
- `active` — `false` for legacy identifiers that still exist on old IBANs.
- `notes` — Optional context.

## Current coverage

| IBAN code | Short | English name | Arabic name | Active |
|-----------|-------|--------------|-------------|--------|
| 05 | ALINMA | Alinma Bank | مصرف الإنماء | yes |
| 10 | SNB | Saudi National Bank (SNB) | البنك الأهلي السعودي | yes |
| 15 | ALBILAD | Bank Albilad | بنك البلاد | yes |
| 20 | RIYAD | Riyad Bank | بنك الرياض | yes |
| 30 | ANB | Arab National Bank | البنك العربي الوطني | yes |
| 40 | SAMBA | Samba Financial Group (legacy) | مجموعة سامبا المالية | no |
| 45 | SABB | Saudi British Bank (SABB) | البنك السعودي البريطاني | yes |
| 50 | ALAAWWAL | Alawwal Bank (legacy) | البنك الأول | no |
| 55 | BSF | Banque Saudi Fransi | البنك السعودي الفرنسي | yes |
| 60 | BJAZ | Bank AlJazira | بنك الجزيرة | yes |
| 65 | SAIB | The Saudi Investment Bank | البنك السعودي للاستثمار | yes |
| 71 | NBB | National Bank of Bahrain (Saudi Branch) | بنك البحرين الوطني | yes |
| 75 | NBK | National Bank of Kuwait (Saudi Branch) | بنك الكويت الوطني | yes |
| 76 | BMUSCAT | Bank Muscat (Saudi Branch) | بنك مسقط | yes |
| 80 | RAJHI | Al Rajhi Bank | مصرف الراجحي | yes |
| 81 | DEUTSCHE | Deutsche Bank (Saudi Branch) | دويتشه بنك | yes |
| 82 | NBP | National Bank of Pakistan (Saudi Branch) | البنك الوطني الباكستاني | yes |
| 84 | ZIRAAT | Ziraat Bankası (Saudi Branch) | بنك زراعات التركي | yes |
| 85 | BNP | BNP Paribas (Saudi Branch) | بي إن بي باريبا | yes |
| 86 | JPM | JPMorgan Chase Bank (Saudi Branch) | جي بي مورغان تشيس بنك | yes |
| 90 | GIB | Gulf International Bank | بنك الخليج الدولي | yes |
| 95 | ENBD | Emirates NBD (Emirates Bank International) | بنك الإمارات دبي الوطني | yes |

If you spot an omission or change (e.g., new branches or retired identifiers), open a PR or file an issue.

## Testing

```bash
composer install
./vendor/bin/phpunit
```

Tests validate uniqueness of identifiers, basic lookup helpers, and a sample IBAN parse.

## License

MIT
