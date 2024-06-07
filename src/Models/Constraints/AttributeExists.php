<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/einvoice source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Models\Constraints;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class AttributeExists extends Constraint
{
    public $message = 'The property "{{ name }}" does not exist in the input data.';
    public $name;

    public function __construct(string $name, array $options = null)
    {
        parent::__construct($options);
        $this->name = $name;
    }
}
