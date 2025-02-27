<?php

namespace InvoiceNinja\EInvoice\Models\Peppol\EmbeddedDocumentBinaryObjectType;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class EmbeddedDocumentBinaryObject
{
    /** @var string */
    #[SerializedName('#')]
    public string $value;

    /** @var string */
    #[NotBlank]
    #[NotNull]
    #[SerializedName('@mimeCode')]
    public string $mimeCode;

}
