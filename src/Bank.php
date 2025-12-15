<?php

namespace Meita\SaudiBanks;

/**
 * Lightweight value object describing a Saudi bank IBAN identifier entry.
 */
final class Bank
{
    private string $ibanIdentifier;
    private string $englishName;
    private string $arabicName;
    private string $shortName;
    private bool $active;
    private ?string $notes;

    /**
     * @param string      $ibanIdentifier Two digit IBAN identifier as used in positions 5-6 of a Saudi IBAN.
     * @param string      $englishName    Formal English name.
     * @param string      $arabicName     Formal Arabic name.
     * @param string      $shortName      Common short name or ticker.
     * @param bool        $active         Whether the identifier is still actively issued (legacy IBANs can stay false).
     * @param string|null $notes          Optional free-form notes.
     */
    public function __construct(
        string $ibanIdentifier,
        string $englishName,
        string $arabicName,
        string $shortName,
        bool $active = true,
        ?string $notes = null
    ) {
        $this->ibanIdentifier = $ibanIdentifier;
        $this->englishName = $englishName;
        $this->arabicName = $arabicName;
        $this->shortName = $shortName;
        $this->active = $active;
        $this->notes = $notes;
    }

    public function ibanIdentifier(): string
    {
        return $this->ibanIdentifier;
    }

    public function englishName(): string
    {
        return $this->englishName;
    }

    public function arabicName(): string
    {
        return $this->arabicName;
    }

    public function shortName(): string
    {
        return $this->shortName;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function notes(): ?string
    {
        return $this->notes;
    }

    /**
     * Export as a plain associative array for serialization or JSON output.
     *
     * @return array{iban_identifier:string,english_name:string,arabic_name:string,short_name:string,active:bool,notes:?string}
     */
    public function toArray(): array
    {
        return [
            'iban_identifier' => $this->ibanIdentifier,
            'english_name' => $this->englishName,
            'arabic_name' => $this->arabicName,
            'short_name' => $this->shortName,
            'active' => $this->active,
            'notes' => $this->notes,
        ];
    }
}
