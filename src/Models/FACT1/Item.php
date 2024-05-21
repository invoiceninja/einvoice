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
	#[DataCollectionOf('Description')]
	public string|Optional $Description;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PackQuantity;
	public string|Optional $PackSizeNumeric;
	public bool|Optional $CatalogueIndicator;
	public string|Optional $Name;
	public bool|Optional $HazardousRiskIndicator;

	#[DataCollectionOf('AdditionalInformation')]
	public string|Optional $AdditionalInformation;

	#[DataCollectionOf('Keyword')]
	public string|Optional $Keyword;

	#[DataCollectionOf('BrandName')]
	public string|Optional $BrandName;

	#[DataCollectionOf('ModelName')]
	public string|Optional $ModelName;
	public BuyersItemIdentification|Optional $BuyersItemIdentification;
	public SellersItemIdentification|Optional $SellersItemIdentification;

	#[DataCollectionOf('ManufacturersItemIdentification')]
	public ManufacturersItemIdentification|Optional $ManufacturersItemIdentification;
	public StandardItemIdentification|Optional $StandardItemIdentification;
	public CatalogueItemIdentification|Optional $CatalogueItemIdentification;

	#[DataCollectionOf('AdditionalItemIdentification')]
	public AdditionalItemIdentification|Optional $AdditionalItemIdentification;
	public CatalogueDocumentReference|Optional $CatalogueDocumentReference;

	#[DataCollectionOf('ItemSpecificationDocumentReference')]
	public ItemSpecificationDocumentReference|Optional $ItemSpecificationDocumentReference;
	public OriginCountry|Optional $OriginCountry;

	#[DataCollectionOf('CommodityClassification')]
	public CommodityClassification|Optional $CommodityClassification;

	#[DataCollectionOf('TransactionConditions')]
	public TransactionConditions|Optional $TransactionConditions;

	#[DataCollectionOf('HazardousItem')]
	public HazardousItem|Optional $HazardousItem;

	#[DataCollectionOf('ClassifiedTaxCategory')]
	public ClassifiedTaxCategory|Optional $ClassifiedTaxCategory;

	#[DataCollectionOf('AdditionalItemProperty')]
	public AdditionalItemProperty|Optional $AdditionalItemProperty;

	#[DataCollectionOf('ManufacturerParty')]
	public ManufacturerParty|Optional $ManufacturerParty;
	public InformationContentProviderParty|Optional $InformationContentProviderParty;

	#[DataCollectionOf('OriginAddress')]
	public OriginAddress|Optional $OriginAddress;

	#[DataCollectionOf('ItemInstance')]
	public ItemInstance|Optional $ItemInstance;

	#[DataCollectionOf('Certificate')]
	public Certificate|Optional $Certificate;

	#[DataCollectionOf('Dimension')]
	public Dimension|Optional $Dimension;
}
