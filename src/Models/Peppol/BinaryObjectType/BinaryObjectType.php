<?php

namespace InvoiceNinja\EInvoice\Models\Peppol\BinaryObjectType;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class BinaryObjectType
{

	/** @var string */
	#[SerializedName('#')]
	public string $value;

    /** @var string */
    #[NotBlank]
    #[NotNull]
    #[SerializedName('@mimeCode')]
    private string $mimeCode;

}
