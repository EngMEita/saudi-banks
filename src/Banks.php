<?php

namespace Meita\SaudiBanks;

use InvalidArgumentException;

/**
 * Static repository containing IBAN identifiers for Saudi banks.
 */
final class Banks
{
    /**
     * Core dataset. Keep identifiers as strings to preserve leading zeros.
     *
     * Notes:
     * - Some identifiers are marked inactive because the bank merged; legacy IBANs can still resolve to them.
     * - The IBAN identifier is always the two digits that appear in positions 5-6 of a Saudi IBAN (SAkkBB...).
     *
     * @var array<int,array{
     *     iban_identifier:string,
     *     english_name:string,
     *     arabic_name:string,
     *     short_name:string,
     *     active:bool,
     *     notes:?string
     * }>
     */
    private const DATA = [
        [
            'iban_identifier' => '05',
            'english_name' => 'Alinma Bank',
            'arabic_name' => 'مصرف الإنماء',
            'short_name' => 'ALINMA',
            'active' => true,
            'notes' => 'Sometimes machine-translated as “Development Bank”.',
        ],
        [
            'iban_identifier' => '10',
            'english_name' => 'Saudi National Bank (SNB)',
            'arabic_name' => 'البنك الأهلي السعودي',
            'short_name' => 'SNB',
            'active' => true,
            'notes' => 'Formerly National Commercial Bank (NCB).',
        ],
        [
            'iban_identifier' => '15',
            'english_name' => 'Bank Albilad',
            'arabic_name' => 'بنك البلاد',
            'short_name' => 'ALBILAD',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '20',
            'english_name' => 'Riyad Bank',
            'arabic_name' => 'بنك الرياض',
            'short_name' => 'RIYAD',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '30',
            'english_name' => 'Arab National Bank',
            'arabic_name' => 'البنك العربي الوطني',
            'short_name' => 'ANB',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '40',
            'english_name' => 'Samba Financial Group',
            'arabic_name' => 'مجموعة سامبا المالية',
            'short_name' => 'SAMBA',
            'active' => false,
            'notes' => 'Merged into SNB; legacy IBANs may still contain this code.',
        ],
        [
            'iban_identifier' => '45',
            'english_name' => 'Saudi British Bank (SABB)',
            'arabic_name' => 'البنك السعودي البريطاني',
            'short_name' => 'SABB',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '50',
            'english_name' => 'Alawwal Bank',
            'arabic_name' => 'البنك الأول',
            'short_name' => 'ALAWAL',
            'active' => false,
            'notes' => 'Merged into SABB; keep for legacy IBANs.',
        ],
        [
            'iban_identifier' => '55',
            'english_name' => 'Banque Saudi Fransi',
            'arabic_name' => 'البنك السعودي الفرنسي',
            'short_name' => 'BSF',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '60',
            'english_name' => 'Bank AlJazira',
            'arabic_name' => 'بنك الجزيرة',
            'short_name' => 'BJAZ',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '65',
            'english_name' => 'The Saudi Investment Bank',
            'arabic_name' => 'البنك السعودي للاستثمار',
            'short_name' => 'SAIB',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '71',
            'english_name' => 'National Bank of Bahrain (Saudi Branch)',
            'arabic_name' => 'بنك البحرين الوطني',
            'short_name' => 'NBB',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '75',
            'english_name' => 'National Bank of Kuwait (Saudi Branch)',
            'arabic_name' => 'بنك الكويت الوطني',
            'short_name' => 'NBK',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '76',
            'english_name' => 'Bank Muscat (Saudi Branch)',
            'arabic_name' => 'بنك مسقط',
            'short_name' => 'BMUSCAT',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '80',
            'english_name' => 'Al Rajhi Bank',
            'arabic_name' => 'مصرف الراجحي',
            'short_name' => 'RAJHI',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '81',
            'english_name' => 'Deutsche Bank (Saudi Branch)',
            'arabic_name' => 'دويتشه بنك',
            'short_name' => 'DEUTSCHE',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '82',
            'english_name' => 'National Bank of Pakistan (Saudi Branch)',
            'arabic_name' => 'البنك الوطني الباكستاني',
            'short_name' => 'NBP',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '84',
            'english_name' => 'Ziraat Bankası (Saudi Branch)',
            'arabic_name' => 'بنك زراعات التركي',
            'short_name' => 'ZIRAAT',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '85',
            'english_name' => 'BNP Paribas (Saudi Branch)',
            'arabic_name' => 'بي إن بي باريبا',
            'short_name' => 'BNP',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '86',
            'english_name' => 'JPMorgan Chase Bank (Saudi Branch)',
            'arabic_name' => 'جي بي مورغان تشيس بنك',
            'short_name' => 'JPM',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '90',
            'english_name' => 'Gulf International Bank',
            'arabic_name' => 'بنك الخليج الدولي',
            'short_name' => 'GIB',
            'active' => true,
            'notes' => null,
        ],
        [
            'iban_identifier' => '95',
            'english_name' => 'Emirates NBD (Emirates Bank International)',
            'arabic_name' => 'بنك الإمارات دبي الوطني',
            'short_name' => 'ENBD',
            'active' => true,
            'notes' => null,
        ],
    ];

    /**
     * @return list<Bank>
     */
    public static function all(): array
    {
        return array_map(
            static fn (array $row): Bank => new Bank(
                $row['iban_identifier'],
                $row['english_name'],
                $row['arabic_name'],
                $row['short_name'],
                $row['active'],
                $row['notes']
            ),
            self::DATA
        );
    }

    /**
     * Lookup by the two-digit IBAN identifier.
     */
    public static function findByIbanIdentifier(string $identifier): Bank
    {
        $normalized = str_pad(trim($identifier), 2, '0', STR_PAD_LEFT);

        foreach (self::all() as $bank) {
            if ($bank->ibanIdentifier() === $normalized) {
                return $bank;
            }
        }

        throw new InvalidArgumentException("No bank found with IBAN identifier {$normalized}");
    }

    /**
     * Attempt to resolve the bank from a full Saudi IBAN.
     *
     * @param string $iban A 24-character SA IBAN (spaces are allowed and will be stripped).
     */
    public static function findByIban(string $iban): Bank
    {
        $normalized = strtoupper(str_replace(' ', '', $iban));

        if (strlen($normalized) !== 24 || !str_starts_with($normalized, 'SA')) {
            throw new InvalidArgumentException('Expected a 24-character Saudi IBAN starting with "SA".');
        }

        $identifier = substr($normalized, 4, 2);

        return self::findByIbanIdentifier($identifier);
    }
}
