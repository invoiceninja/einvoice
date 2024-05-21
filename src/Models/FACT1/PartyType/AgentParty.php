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
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class AgentParty extends Data
{
	public bool|Optional $MarkCareIndicator;
	public bool|Optional $MarkAttentionIndicator;
	public string|Optional $WebsiteURI;
	public string|Optional $LogoReferenceID;
	public string|Optional $EndpointID;
	public string|Optional $IndustryClassificationCode;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyIdentificationType\PartyIdentification')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PartyIdentification;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyNameType\PartyName')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PartyName;
	public Language|Optional $Language;
	public PostalAddress|Optional $PostalAddress;
	public PhysicalLocation|Optional $PhysicalLocation;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyTaxSchemeType\PartyTaxScheme')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PartyTaxScheme;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PartyLegalEntityType\PartyLegalEntity')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PartyLegalEntity;
	public Contact|Optional $Contact;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PersonType\Person')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Person;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ServiceProviderPartyType\ServiceProviderParty')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ServiceProviderParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PowerOfAttorneyType\PowerOfAttorney')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PowerOfAttorney;
	public FinancialAccount|Optional $FinancialAccount;
}
