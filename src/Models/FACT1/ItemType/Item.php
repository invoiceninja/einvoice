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
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class Item extends Data
{
	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	#[Max(200)]
	public string|Optional $Description;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PackQuantity;
	public string|Optional $PackSizeNumeric;
	public bool|Optional $CatalogueIndicator;

	#[Max(100)]
	public string|Optional $Name;
	public bool|Optional $HazardousRiskIndicator;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $AdditionalInformation;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $Keyword;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $BrandName;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $ModelName;
	public BuyersItemIdentification|Optional $BuyersItemIdentification;
	public SellersItemIdentification|Optional $SellersItemIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\ManufacturersItemIdentification')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ManufacturersItemIdentification|Optional $ManufacturersItemIdentification;
	public StandardItemIdentification|Optional $StandardItemIdentification;
	public CatalogueItemIdentification|Optional $CatalogueItemIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\AdditionalItemIdentification')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public AdditionalItemIdentification|Optional $AdditionalItemIdentification;
	public CatalogueDocumentReference|Optional $CatalogueDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ItemSpecificationDocumentReference')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ItemSpecificationDocumentReference|Optional $ItemSpecificationDocumentReference;
	public OriginCountry|Optional $OriginCountry;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public CommodityClassification|Optional $CommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType\TransactionConditions')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public TransactionConditions|Optional $TransactionConditions;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousItemType\HazardousItem')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public HazardousItem|Optional $HazardousItem;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ClassifiedTaxCategory')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ClassifiedTaxCategory|Optional $ClassifiedTaxCategory;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public AdditionalItemProperty|Optional $AdditionalItemProperty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyType\ManufacturerParty')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ManufacturerParty|Optional $ManufacturerParty;
	public InformationContentProviderParty|Optional $InformationContentProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public OriginAddress|Optional $OriginAddress;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemInstanceType\ItemInstance')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ItemInstance|Optional $ItemInstance;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CertificateType\Certificate')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Certificate|Optional $Certificate;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\Dimension')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Dimension|Optional $Dimension;
}
