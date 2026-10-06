<?php

/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2026. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

declare(strict_types=1);

namespace InvoiceNinja\EInvoice\Validation;

/**
 * Canonical paths for OpenPEPPOL / CEN EN16931 schematron sources and compiled stylesheets.
 */
final class PeppolValidationAssets
{
    public const DIR = 'src/Validation/Peppol';

    public const CEN_UBL_SCH = self::DIR.'/CEN-EN16931-UBL.sch';

    public const CEN_UBL_XSLT = self::DIR.'/CEN-EN16931-UBL.xslt';

    public const PEPPOL_UBL_SCH = self::DIR.'/PEPPOL-EN16931-UBL.sch';

    public const PEPPOL_UBL_XSLT = self::DIR.'/PEPPOL-EN16931-UBL.xslt';

    public const CEN_CII_SCH = self::DIR.'/CEN-EN16931-CII.sch';

    public const CEN_CII_XSLT = self::DIR.'/CEN-EN16931-CII.xslt';

    public const PEPPOL_CII_SCH = self::DIR.'/PEPPOL-EN16931-CII.sch';

    public const PEPPOL_CII_XSLT = self::DIR.'/PEPPOL-EN16931-CII.xslt';

    /** @return list<string> UBL stylesheets in validation order (CEN then Peppol). */
    public static function ublXsltRelativePaths(): array
    {
        return [self::CEN_UBL_XSLT, self::PEPPOL_UBL_XSLT];
    }

    public static function packageRoot(): string
    {
        return dirname(__DIR__, 2);
    }

    public static function absolute(string $relativeFromPackageRoot): string
    {
        return self::packageRoot().'/'.ltrim($relativeFromPackageRoot, '/');
    }
}
