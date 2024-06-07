<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\OriginAddress;
use Invoiceninja\Einvoice\Models\Peppol\CertificateType\Certificate;
use Invoiceninja\Einvoice\Models\Peppol\CommodityClassificationType\CommodityClassification;
use Invoiceninja\Einvoice\Models\Peppol\CountryType\OriginCountry;
use Invoiceninja\Einvoice\Models\Peppol\DimensionType\Dimension;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\CatalogueDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ItemSpecificationDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\HazardousItemType\HazardousItem;
use Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\AdditionalItemIdentification;
use Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\BuyersItemIdentification;
use Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\CatalogueItemIdentification;
use Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\ManufacturersItemIdentification;
use Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\SellersItemIdentification;
use Invoiceninja\Einvoice\Models\Peppol\ItemIdentificationType\StandardItemIdentification;
use Invoiceninja\Einvoice\Models\Peppol\ItemInstanceType\ItemInstance;
use Invoiceninja\Einvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\InformationContentProviderParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\ManufacturerParty;
use Invoiceninja\Einvoice\Models\Peppol\QuantityType\PackQuantity;
use Invoiceninja\Einvoice\Models\Peppol\TaxCategoryType\ClassifiedTaxCategory;
use Invoiceninja\Einvoice\Models\Peppol\TransactionConditionsType\TransactionConditions;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Item
{
    /** @var string */
    #[SerializedName('cbc:Description')]
    public string $Description;

    /** @var PackQuantity */
    #[SerializedName('cbc:PackQuantity')]
    public $PackQuantity;

    /** @var string */
    #[SerializedName('cbc:PackSizeNumeric')]
    public string $PackSizeNumeric;

    /** @var bool */
    #[SerializedName('cbc:CatalogueIndicator')]
    public bool $CatalogueIndicator;

    /** @var string */
    #[SerializedName('cbc:Name')]
    public string $Name;

    /** @var bool */
    #[SerializedName('cbc:HazardousRiskIndicator')]
    public bool $HazardousRiskIndicator;

    /** @var string */
    #[SerializedName('cbc:AdditionalInformation')]
    public string $AdditionalInformation;

    /** @var string */
    #[SerializedName('cbc:Keyword')]
    public string $Keyword;

    /** @var string */
    #[SerializedName('cbc:BrandName')]
    public string $BrandName;

    /** @var string */
    #[SerializedName('cbc:ModelName')]
    public string $ModelName;

    /** @var BuyersItemIdentification */
    #[SerializedName('cac:BuyersItemIdentification')]
    public $BuyersItemIdentification;

    /** @var SellersItemIdentification */
    #[SerializedName('cac:SellersItemIdentification')]
    public $SellersItemIdentification;

    /** @var ManufacturersItemIdentification[] */
    #[SerializedName('cac:ManufacturersItemIdentification')]
    public array $ManufacturersItemIdentification;

    /** @var StandardItemIdentification */
    #[SerializedName('cac:StandardItemIdentification')]
    public $StandardItemIdentification;

    /** @var CatalogueItemIdentification */
    #[SerializedName('cac:CatalogueItemIdentification')]
    public $CatalogueItemIdentification;

    /** @var AdditionalItemIdentification[] */
    #[SerializedName('cac:AdditionalItemIdentification')]
    public array $AdditionalItemIdentification;

    /** @var CatalogueDocumentReference */
    #[SerializedName('cac:CatalogueDocumentReference')]
    public $CatalogueDocumentReference;

    /** @var ItemSpecificationDocumentReference[] */
    #[SerializedName('cac:ItemSpecificationDocumentReference')]
    public array $ItemSpecificationDocumentReference;

    /** @var OriginCountry */
    #[SerializedName('cac:OriginCountry')]
    public $OriginCountry;

    /** @var CommodityClassification[] */
    #[SerializedName('cac:CommodityClassification')]
    public array $CommodityClassification;

    /** @var TransactionConditions[] */
    #[SerializedName('cac:TransactionConditions')]
    public array $TransactionConditions;

    /** @var HazardousItem[] */
    #[SerializedName('cac:HazardousItem')]
    public array $HazardousItem;

    /** @var ClassifiedTaxCategory[] */
    #[SerializedName('cac:ClassifiedTaxCategory')]
    public array $ClassifiedTaxCategory;

    /** @var AdditionalItemProperty[] */
    #[SerializedName('cac:AdditionalItemProperty')]
    public array $AdditionalItemProperty;

    /** @var ManufacturerParty[] */
    #[SerializedName('cac:ManufacturerParty')]
    public array $ManufacturerParty;

    /** @var InformationContentProviderParty */
    #[SerializedName('cac:InformationContentProviderParty')]
    public $InformationContentProviderParty;

    /** @var OriginAddress[] */
    #[SerializedName('cac:OriginAddress')]
    public array $OriginAddress;

    /** @var ItemInstance[] */
    #[SerializedName('cac:ItemInstance')]
    public array $ItemInstance;

    /** @var Certificate[] */
    #[SerializedName('cac:Certificate')]
    public array $Certificate;

    /** @var Dimension[] */
    #[SerializedName('cac:Dimension')]
    public array $Dimension;
}
