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
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OperatingParty extends Data
{
	public bool|Optional $MarkCareIndicator;
	public bool|Optional $MarkAttentionIndicator;
	public string|Optional $WebsiteURI;
	public string|Optional $LogoReferenceID;
	public string|Optional $EndpointID;
	public string|Optional $IndustryClassificationCode;
	public PartyIdentification|Optional $PartyIdentification;
	public PartyName|Optional $PartyName;
	public Language|Optional $Language;
	public PostalAddress|Optional $PostalAddress;
	public PhysicalLocation|Optional $PhysicalLocation;
	public PartyTaxScheme|Optional $PartyTaxScheme;
	public PartyLegalEntity|Optional $PartyLegalEntity;
	public Contact|Optional $Contact;
	public Person|Optional $Person;
	public AgentParty|Optional $AgentParty;
	public ServiceProviderParty|Optional $ServiceProviderParty;
	public PowerOfAttorney|Optional $PowerOfAttorney;
	public FinancialAccount|Optional $FinancialAccount;
}
