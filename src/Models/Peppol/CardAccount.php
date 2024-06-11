<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CV2IDType\CV2ID;
use InvoiceNinja\EInvoice\Models\Peppol\ChipApplicationIDType\ChipApplicationID;
use InvoiceNinja\EInvoice\Models\Peppol\IssueNumberIDType\IssueNumberID;
use InvoiceNinja\EInvoice\Models\Peppol\IssuerIDType\IssuerID;
use InvoiceNinja\EInvoice\Models\Peppol\NetworkIDType\NetworkID;
use InvoiceNinja\EInvoice\Models\Peppol\PrimaryAccountNumberIDType\PrimaryAccountNumberID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class CardAccount
{
	/** @var PrimaryAccountNumberID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:PrimaryAccountNumberID')]
	public $PrimaryAccountNumberID;

	/** @var NetworkID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:NetworkID')]
	public $NetworkID;

	/** @var string */
	#[SerializedName('cbc:CardTypeCode')]
	public string $CardTypeCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ValidityStartDate')]
	public \DateTime $ValidityStartDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ExpiryDate')]
	public \DateTime $ExpiryDate;

	/** @var IssuerID */
	#[SerializedName('cbc:IssuerID')]
	public $IssuerID;

	/** @var IssueNumberID */
	#[SerializedName('cbc:IssueNumberID')]
	public $IssueNumberID;

	/** @var CV2ID */
	#[SerializedName('cbc:CV2ID')]
	public $CV2ID;

	/** @var string */
	#[SerializedName('cbc:CardChipCode')]
	public string $CardChipCode;

	/** @var ChipApplicationID */
	#[SerializedName('cbc:ChipApplicationID')]
	public $ChipApplicationID;

	/** @var string */
	#[SerializedName('cbc:HolderName')]
	public string $HolderName;
}
