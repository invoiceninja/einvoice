<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress;
use Invoiceninja\Einvoice\Models\FACT1\CertificateType\Certificate;
use Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification;
use Invoiceninja\Einvoice\Models\FACT1\CountryType\OriginCountry;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\Dimension;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\CatalogueDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ItemSpecificationDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\HazardousItemType\HazardousItem;
use Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\AdditionalItemIdentification;
use Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\BuyersItemIdentification;
use Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\CatalogueItemIdentification;
use Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\ManufacturersItemIdentification;
use Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\SellersItemIdentification;
use Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\StandardItemIdentification;
use Invoiceninja\Einvoice\Models\FACT1\ItemInstanceType\ItemInstance;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\InformationContentProviderParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\ManufacturerParty;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\PackQuantity;
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ClassifiedTaxCategory;
use Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType\TransactionConditions;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Item
{
	/** @var string */
	#[Length(min: null, max: 200)]
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
	#[Length(min: null, max: 100)]
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
	public array $ManufacturersItemIdentification = [];

	/** @var StandardItemIdentification */
	#[SerializedName('cac:StandardItemIdentification')]
	public $StandardItemIdentification;

	/** @var CatalogueItemIdentification */
	#[SerializedName('cac:CatalogueItemIdentification')]
	public $CatalogueItemIdentification;

	/** @var AdditionalItemIdentification[] */
	#[SerializedName('cac:AdditionalItemIdentification')]
	public array $AdditionalItemIdentification = [];

	/** @var CatalogueDocumentReference */
	#[SerializedName('cac:CatalogueDocumentReference')]
	public $CatalogueDocumentReference;

	/** @var ItemSpecificationDocumentReference[] */
	#[SerializedName('cac:ItemSpecificationDocumentReference')]
	public array $ItemSpecificationDocumentReference = [];

	/** @var OriginCountry */
	#[SerializedName('cac:OriginCountry')]
	public $OriginCountry;

	/** @var CommodityClassification[] */
	#[SerializedName('cac:CommodityClassification')]
	public array $CommodityClassification = [];

	/** @var TransactionConditions[] */
	#[SerializedName('cac:TransactionConditions')]
	public array $TransactionConditions = [];

	/** @var HazardousItem[] */
	#[SerializedName('cac:HazardousItem')]
	public array $HazardousItem = [];

	/** @var ClassifiedTaxCategory[] */
	#[SerializedName('cac:ClassifiedTaxCategory')]
	public array $ClassifiedTaxCategory = [];

	/** @var AdditionalItemProperty[] */
	#[SerializedName('cac:AdditionalItemProperty')]
	public array $AdditionalItemProperty = [];

	/** @var ManufacturerParty[] */
	#[SerializedName('cac:ManufacturerParty')]
	public array $ManufacturerParty = [];

	/** @var InformationContentProviderParty */
	#[SerializedName('cac:InformationContentProviderParty')]
	public $InformationContentProviderParty;

	/** @var OriginAddress[] */
	#[SerializedName('cac:OriginAddress')]
	public array $OriginAddress = [];

	/** @var ItemInstance[] */
	#[SerializedName('cac:ItemInstance')]
	public array $ItemInstance = [];

	/** @var Certificate[] */
	#[SerializedName('cac:Certificate')]
	public array $Certificate = [];

	/** @var Dimension[] */
	#[SerializedName('cac:Dimension')]
	public array $Dimension = [];
}
