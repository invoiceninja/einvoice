<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

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
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Item extends Data
{
	#[DataCollectionOf('string')]
	public string|Optional $Description;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PackQuantity;
	public string|Optional $PackSizeNumeric;
	public bool|Optional $CatalogueIndicator;
	public string|Optional $Name;
	public bool|Optional $HazardousRiskIndicator;

	#[DataCollectionOf('string')]
	public string|Optional $AdditionalInformation;

	#[DataCollectionOf('string')]
	public string|Optional $Keyword;

	#[DataCollectionOf('string')]
	public string|Optional $BrandName;

	#[DataCollectionOf('string')]
	public string|Optional $ModelName;
	public BuyersItemIdentification|Optional $BuyersItemIdentification;
	public SellersItemIdentification|Optional $SellersItemIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\ManufacturersItemIdentification')]
	public ManufacturersItemIdentification|Optional $ManufacturersItemIdentification;
	public StandardItemIdentification|Optional $StandardItemIdentification;
	public CatalogueItemIdentification|Optional $CatalogueItemIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\AdditionalItemIdentification')]
	public AdditionalItemIdentification|Optional $AdditionalItemIdentification;
	public CatalogueDocumentReference|Optional $CatalogueDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ItemSpecificationDocumentReference')]
	public ItemSpecificationDocumentReference|Optional $ItemSpecificationDocumentReference;
	public OriginCountry|Optional $OriginCountry;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification')]
	public CommodityClassification|Optional $CommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType\TransactionConditions')]
	public TransactionConditions|Optional $TransactionConditions;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousItemType\HazardousItem')]
	public HazardousItem|Optional $HazardousItem;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ClassifiedTaxCategory')]
	public ClassifiedTaxCategory|Optional $ClassifiedTaxCategory;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty')]
	public AdditionalItemProperty|Optional $AdditionalItemProperty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyType\ManufacturerParty')]
	public ManufacturerParty|Optional $ManufacturerParty;
	public InformationContentProviderParty|Optional $InformationContentProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress')]
	public OriginAddress|Optional $OriginAddress;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemInstanceType\ItemInstance')]
	public ItemInstance|Optional $ItemInstance;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CertificateType\Certificate')]
	public Certificate|Optional $Certificate;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\Dimension')]
	public Dimension|Optional $Dimension;
}
