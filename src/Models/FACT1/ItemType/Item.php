<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemType;

use Carbon\Carbon;
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
use Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ClassifiedTaxCategory;
use Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType\TransactionConditions;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Item extends Data
{
	/** @param array<Description> $Description */
	#[Max(200)]
	public array|Optional $Description;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PackQuantity;
	public string|Optional $PackSizeNumeric;
	public bool|Optional $CatalogueIndicator;

	#[Max(100)]
	public string|Optional $Name;
	public bool|Optional $HazardousRiskIndicator;

	/** @param array<AdditionalInformation> $AdditionalInformation */
	public array|Optional $AdditionalInformation;

	/** @param array<Keyword> $Keyword */
	public array|Optional $Keyword;

	/** @param array<BrandName> $BrandName */
	public array|Optional $BrandName;

	/** @param array<ModelName> $ModelName */
	public array|Optional $ModelName;
	public BuyersItemIdentification|Optional $BuyersItemIdentification;
	public SellersItemIdentification|Optional $SellersItemIdentification;

	/** @param array<ManufacturersItemIdentification> $ManufacturersItemIdentification */
	public array|Optional $ManufacturersItemIdentification;
	public StandardItemIdentification|Optional $StandardItemIdentification;
	public CatalogueItemIdentification|Optional $CatalogueItemIdentification;

	/** @param array<AdditionalItemIdentification> $AdditionalItemIdentification */
	public array|Optional $AdditionalItemIdentification;
	public CatalogueDocumentReference|Optional $CatalogueDocumentReference;

	/** @param array<ItemSpecificationDocumentReference> $ItemSpecificationDocumentReference */
	public array|Optional $ItemSpecificationDocumentReference;
	public OriginCountry|Optional $OriginCountry;

	/** @param array<CommodityClassification> $CommodityClassification */
	public array|Optional $CommodityClassification;

	/** @param array<TransactionConditions> $TransactionConditions */
	public array|Optional $TransactionConditions;

	/** @param array<HazardousItem> $HazardousItem */
	public array|Optional $HazardousItem;

	/** @param array<ClassifiedTaxCategory> $ClassifiedTaxCategory */
	public array|Optional $ClassifiedTaxCategory;

	/** @param array<AdditionalItemProperty> $AdditionalItemProperty */
	public array|Optional $AdditionalItemProperty;

	/** @param array<ManufacturerParty> $ManufacturerParty */
	public array|Optional $ManufacturerParty;
	public InformationContentProviderParty|Optional $InformationContentProviderParty;

	/** @param array<OriginAddress> $OriginAddress */
	public array|Optional $OriginAddress;

	/** @param array<ItemInstance> $ItemInstance */
	public array|Optional $ItemInstance;

	/** @param array<Certificate> $Certificate */
	public array|Optional $Certificate;

	/** @param array<Dimension> $Dimension */
	public array|Optional $Dimension;
}
