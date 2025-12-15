<?php

use Meita\SaudiBanks\Bank;
use Meita\SaudiBanks\Banks;
use PHPUnit\Framework\TestCase;

final class BanksTest extends TestCase
{
    public function test_all_returns_bank_objects(): void
    {
        $all = Banks::all();

        $this->assertNotEmpty($all);
        $this->assertContainsOnlyInstancesOf(Bank::class, $all);
    }

    public function test_identifiers_are_unique(): void
    {
        $identifiers = array_map(fn (Bank $bank) => $bank->ibanIdentifier(), Banks::all());
        $this->assertCount(count($identifiers), array_unique($identifiers), 'IBAN identifiers must be unique');
    }

    public function test_find_by_identifier_is_case_insensitive_and_pads(): void
    {
        $bank = Banks::findByIbanIdentifier('5'); // should resolve to 05
        $this->assertSame('05', $bank->ibanIdentifier());
        $this->assertSame('ALINMA', $bank->shortName());
    }

    public function test_find_by_iban_extracts_identifier(): void
    {
        $iban = 'SA0380000000608010167519'; // valid length with bank code 80 (Al Rajhi)
        $bank = Banks::findByIban($iban);

        $this->assertSame('80', $bank->ibanIdentifier());
        $this->assertSame('RAJHI', $bank->shortName());
    }

    public function test_to_array_contains_expected_keys(): void
    {
        $bank = Banks::findByIbanIdentifier('80');
        $arr = $bank->toArray();

        $this->assertArrayHasKey('iban_identifier', $arr);
        $this->assertArrayHasKey('english_name', $arr);
        $this->assertArrayHasKey('arabic_name', $arr);
        $this->assertArrayHasKey('short_name', $arr);
        $this->assertArrayHasKey('active', $arr);
        $this->assertArrayHasKey('notes', $arr);
    }
}
