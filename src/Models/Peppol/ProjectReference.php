<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\WorkPhaseReferenceType\WorkPhaseReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class ProjectReference
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:UUID')]
    public string $UUID;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:IssueDate')]
    public \DateTime $IssueDate;

    /** @var WorkPhaseReference[] */
    #[SerializedName('cac:WorkPhaseReference')]
    public array $WorkPhaseReference;
}
