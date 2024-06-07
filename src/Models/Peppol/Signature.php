<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Peppol\AttachmentType\DigitalSignatureAttachment;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\OriginalDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\SignatoryParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Signature
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:Note')]
    public string $Note;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:ValidationDate')]
    public DateTime $ValidationDate;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
    #[SerializedName('cbc:ValidationTime')]
    public DateTime $ValidationTime;

    /** @var string */
    #[SerializedName('cbc:ValidatorID')]
    public string $ValidatorID;

    /** @var string */
    #[SerializedName('cbc:CanonicalizationMethod')]
    public string $CanonicalizationMethod;

    /** @var string */
    #[SerializedName('cbc:SignatureMethod')]
    public string $SignatureMethod;

    /** @var SignatoryParty */
    #[SerializedName('cac:SignatoryParty')]
    public $SignatoryParty;

    /** @var DigitalSignatureAttachment */
    #[SerializedName('cac:DigitalSignatureAttachment')]
    public $DigitalSignatureAttachment;

    /** @var OriginalDocumentReference */
    #[SerializedName('cac:OriginalDocumentReference')]
    public $OriginalDocumentReference;
}
