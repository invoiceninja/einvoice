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
	#[Max(200)]
	public string|Optional $Description;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PackQuantity;
	public string|Optional $PackSizeNumeric;
	public bool|Optional $CatalogueIndicator;

	#[Max(100)]
	public string|Optional $Name;
	public bool|Optional $HazardousRiskIndicator;
	public string|Optional $AdditionalInformation;
	public string|Optional $Keyword;
	public string|Optional $BrandName;
	public string|Optional $ModelName;
	public BuyersItemIdentification|Optional $BuyersItemIdentification;
	public SellersItemIdentification|Optional $SellersItemIdentification;
	public ManufacturersItemIdentification|Optional $ManufacturersItemIdentification;
	public StandardItemIdentification|Optional $StandardItemIdentification;
	public CatalogueItemIdentification|Optional $CatalogueItemIdentification;
	public AdditionalItemIdentification|Optional $AdditionalItemIdentification;
	public CatalogueDocumentReference|Optional $CatalogueDocumentReference;
	public ItemSpecificationDocumentReference|Optional $ItemSpecificationDocumentReference;
	public OriginCountry|Optional $OriginCountry;
	public CommodityClassification|Optional $CommodityClassification;
	public TransactionConditions|Optional $TransactionConditions;
	public HazardousItem|Optional $HazardousItem;
	public ClassifiedTaxCategory|Optional $ClassifiedTaxCategory;
	public AdditionalItemProperty|Optional $AdditionalItemProperty;
	public ManufacturerParty|Optional $ManufacturerParty;
	public InformationContentProviderParty|Optional $InformationContentProviderParty;
	public OriginAddress|Optional $OriginAddress;
	public ItemInstance|Optional $ItemInstance;
	public Certificate|Optional $Certificate;
	public Dimension|Optional $Dimension;
}
