<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

class CardAccount
{
	/** @var string */
	#[SerializedName('cbc:PrimaryAccountNumberID')]
	public string $PrimaryAccountNumberID;

	/** @var string */
	#[SerializedName('cbc:NetworkID')]
	public string $NetworkID;

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

	/** @var string */
	#[SerializedName('cbc:IssuerID')]
	public string $IssuerID;

	/** @var string */
	#[SerializedName('cbc:IssueNumberID')]
	public string $IssueNumberID;

	/** @var string */
	#[SerializedName('cbc:CV2ID')]
	public string $CV2ID;

	/** @var string */
	#[SerializedName('cbc:CardChipCode')]
	public string $CardChipCode;

	/** @var string */
	#[SerializedName('cbc:ChipApplicationID')]
	public string $ChipApplicationID;

	/** @var string */
	#[Length(min: null, max: 200)]
	#[SerializedName('cbc:HolderName')]
	public string $HolderName;
}
