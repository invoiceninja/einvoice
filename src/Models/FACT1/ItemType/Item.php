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
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class Item extends Data
{
	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	#[Max(200)]
	public DataCollection $Description;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PackQuantity;
	public string|Optional $PackSizeNumeric;
	public bool|Optional $CatalogueIndicator;

	#[Max(100)]
	public string|Optional $Name;
	public bool|Optional $HazardousRiskIndicator;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AdditionalInformation;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Keyword;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $BrandName;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ModelName;
	public BuyersItemIdentification|Optional $BuyersItemIdentification;
	public SellersItemIdentification|Optional $SellersItemIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\ManufacturersItemIdentification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ManufacturersItemIdentification;
	public StandardItemIdentification|Optional $StandardItemIdentification;
	public CatalogueItemIdentification|Optional $CatalogueItemIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType\AdditionalItemIdentification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AdditionalItemIdentification;
	public CatalogueDocumentReference|Optional $CatalogueDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ItemSpecificationDocumentReference')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ItemSpecificationDocumentReference;
	public OriginCountry|Optional $OriginCountry;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CommodityClassificationType\CommodityClassification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $CommodityClassification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TransactionConditionsType\TransactionConditions')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $TransactionConditions;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\HazardousItemType\HazardousItem')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $HazardousItem;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxCategoryType\ClassifiedTaxCategory')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ClassifiedTaxCategory;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AdditionalItemProperty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyType\ManufacturerParty')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ManufacturerParty;
	public InformationContentProviderParty|Optional $InformationContentProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\AddressType\OriginAddress')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $OriginAddress;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ItemInstanceType\ItemInstance')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ItemInstance;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\CertificateType\Certificate')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Certificate;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\Dimension')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Dimension;
}
