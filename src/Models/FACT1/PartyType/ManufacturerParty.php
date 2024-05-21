<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\PostalAddress;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\FinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\LanguageType\Language;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\PhysicalLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyIdentificationType\PartyIdentification;
use Invoiceninja\Einvoice\Models\FACT1\PartyLegalEntityType\PartyLegalEntity;
use Invoiceninja\Einvoice\Models\FACT1\PartyNameType\PartyName;
use Invoiceninja\Einvoice\Models\FACT1\PartyTaxSchemeType\PartyTaxScheme;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\Person;
use Invoiceninja\Einvoice\Models\FACT1\PowerOfAttorneyType\PowerOfAttorney;
use Invoiceninja\Einvoice\Models\FACT1\ServiceProviderPartyType\ServiceProviderParty;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ManufacturerParty extends Data
{
	public bool|Optional $MarkCareIndicator;
	public bool|Optional $MarkAttentionIndicator;
	public string|Optional $WebsiteURI;
	public string|Optional $LogoReferenceID;
	public string|Optional $EndpointID;
	public string|Optional $IndustryClassificationCode;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyIdentificationType\PartyIdentification')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PartyIdentification|Optional $PartyIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyNameType\PartyName')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PartyName|Optional $PartyName;
	public Language|Optional $Language;
	public PostalAddress|Optional $PostalAddress;
	public PhysicalLocation|Optional $PhysicalLocation;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyTaxSchemeType\PartyTaxScheme')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PartyTaxScheme|Optional $PartyTaxScheme;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyLegalEntityType\PartyLegalEntity')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PartyLegalEntity|Optional $PartyLegalEntity;
	public Contact|Optional $Contact;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PersonType\Person')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Person|Optional $Person;
	public AgentParty|Optional $AgentParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ServiceProviderPartyType\ServiceProviderParty')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public ServiceProviderParty|Optional $ServiceProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PowerOfAttorneyType\PowerOfAttorney')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public PowerOfAttorney|Optional $PowerOfAttorney;
	public FinancialAccount|Optional $FinancialAccount;
}
