<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\CorporateStockAmount;
use Invoiceninja\Einvoice\Models\Peppol\CorporateRegistrationSchemeType\CorporateRegistrationScheme;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\HeadOfficeParty;
use Invoiceninja\Einvoice\Models\Peppol\ShareholderPartyType\ShareholderParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class PartyLegalEntity
{
    /** @var string */
    #[SerializedName('cbc:RegistrationName')]
    public string $RegistrationName;

    /** @var string */
    #[SerializedName('cbc:CompanyID')]
    public string $CompanyID;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:RegistrationDate')]
    public \DateTime $RegistrationDate;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:RegistrationExpirationDate')]
    public \DateTime $RegistrationExpirationDate;

    /** @var string */
    #[SerializedName('cbc:CompanyLegalFormCode')]
    public string $CompanyLegalFormCode;

    /** @var string */
    #[SerializedName('cbc:CompanyLegalForm')]
    public string $CompanyLegalForm;

    /** @var bool */
    #[SerializedName('cbc:SoleProprietorshipIndicator')]
    public bool $SoleProprietorshipIndicator;

    /** @var string */
    #[SerializedName('cbc:CompanyLiquidationStatusCode')]
    public string $CompanyLiquidationStatusCode;

    /** @var CorporateStockAmount */
    #[SerializedName('cbc:CorporateStockAmount')]
    public $CorporateStockAmount;

    /** @var bool */
    #[SerializedName('cbc:FullyPaidSharesIndicator')]
    public bool $FullyPaidSharesIndicator;

    /** @var RegistrationAddress */
    #[SerializedName('cac:RegistrationAddress')]
    public $RegistrationAddress;

    /** @var CorporateRegistrationScheme */
    #[SerializedName('cac:CorporateRegistrationScheme')]
    public $CorporateRegistrationScheme;

    /** @var HeadOfficeParty */
    #[SerializedName('cac:HeadOfficeParty')]
    public $HeadOfficeParty;

    /** @var ShareholderParty[] */
    #[SerializedName('cac:ShareholderParty')]
    public array $ShareholderParty;
}
