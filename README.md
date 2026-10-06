# Invoice Ninja E-Invoice (`invoiceninja/einvoice`)

PHP library used by [Invoice Ninja](https://invoiceninja.com) to model, serialize, and validate electronic invoices across several standards. It provides typed document objects (Symfony Serializer), XML/JSON encoding and decoding, and bundled validation artifacts (XSD, Schematron sources, and compiled XSLT stylesheets).

## Standards and layout

| Area | Path | Notes |
|------|------|--------|
| Peppol BIS 3.0 (UBL) | `src/Models/Peppol/`, `src/Writer/Peppol.php` | Invoice and credit note UBL |
| Peppol validation rules | `src/Validation/Peppol/` | OpenPEPPOL/CEN `.sch` and compiled `.xslt` |
| FatturaPA | `src/Models/FatturaPA/`, `src/Writer/FatturaPA.php` | Italian SDI |
| Other | `src/Standards/`, `src/Writer/` | FACT1, UBL scaffolding, etc. |

Runtime object validation uses Symfony Validator on normalized models. **UBL Schematron** (business rules such as EN16931 and Peppol BIS) is applied by compiling ISO Schematron (`.sch`) to XSLT (`.xslt`) and running those stylesheets over XML (for example with Saxon in the main application).

Canonical Peppol/CEN file names match OpenPEPPOL releases, for example:

- `CEN-EN16931-UBL.sch` / `CEN-EN16931-UBL.xslt`
- `PEPPOL-EN16931-UBL.sch` / `PEPPOL-EN16931-UBL.xslt`

Path constants live in `InvoiceNinja\EInvoice\Validation\PeppolValidationAssets`.

## Development

```bash
composer install
composer test          # if configured in your environment
php bin/console list   # package CLI (codegen helpers, schematron sync, …)
```

Console commands are **dev** dependencies (`symfony/console`); consumers typically only require the library autoload.

---

## Updating Schematron (`.sch`) and compiled stylesheets (`.xslt`)

Peppol BIS billing rules are published as [ISO Schematron](https://schematron.com/) `.sch` files. This package stores those sources under `src/Validation/Peppol/` and ships precompiled **SVRL** XSLT produced with the **ISO Schematron skeleton** (in `src/Validation/SchematronCompiler/`). That compiler output is compatible with **Saxon PHP (XSLT 3.0)** used in Invoice Ninja. Do **not** use the vendored SchXslt compile pipeline under `src/Validation/xslt/` for these runtime stylesheets; SchXslt’s SVRL output fails Saxon PHP with static-variable errors.

### Prerequisites

- [Docker](https://docs.docker.com/get-docker/)
- Saxon image (used only at compile time):

  ```bash
  docker pull klakegg/saxon:9.8.0-7
  ```

### Recommended: console command

From the package root:

```bash
php bin/console e:peppol-schematron
```

**Default:** download latest **CEN** and **Peppol UBL** `.sch` from [OpenPEPPOL peppol-bis-invoice-3](https://github.com/OpenPEPPOL/peppol-bis-invoice-3/tree/master/rules/sch), compile both, and write:

- `src/Validation/Peppol/CEN-EN16931-UBL.{sch,xslt}`
- `src/Validation/Peppol/PEPPOL-EN16931-UBL.{sch,xslt}`

**Useful options:**

| Option | Purpose |
|--------|---------|
| `--no-fetch` | Recompile from existing `.sch` in the repo (no download) |
| `--local-rules-dir=/path/to/peppol-bis-invoice-3/rules/sch` | Copy `.sch` from a local clone instead of GitHub |
| `--peppol-only` | Only `PEPPOL-EN16931-UBL` |
| `--all` | Also sync CII rule sets (`*-EN16931-CII`) |
| `--rules=CEN-EN16931-UBL,PEPPOL-EN16931-UBL` | Explicit list |
| `--docker-image=klakegg/saxon:9.8.0-7` | Override Saxon image |

Alias: `peppol:schematron-sync`.

### Manual compile (equivalent to what the command runs)

For one rule set, with Docker and the ISO SVRL meta-stylesheet:

```bash
PKG=/path/to/einvoice
RULE=PEPPOL-EN16931-UBL   # or CEN-EN16931-UBL

docker run --rm \
  -v "$PKG/src/Validation/SchematronCompiler:/compiler:ro" \
  -v "$PKG/src/Validation/Peppol:/sch:ro" \
  -v "$PKG/src/Validation/Peppol:/out" \
  --entrypoint java klakegg/saxon:9.8.0-7 \
  -jar /saxon.jar \
  -xsl:/compiler/iso_svrl_for_xslt2.xsl \
  -s:/sch/${RULE}.sch \
  -o:/out/${RULE}.xslt
```

After updating stylesheets in this package, release a new version and bump the dependency in Invoice Ninja, or copy the `.xslt` files into `app/Services/EDocument/Standards/Validation/Peppol/Stylesheets/` in the main app (which also provides `scripts/compile-peppol-schematron.sh` for the same ISO skeleton workflow against `tests/Feature/EInvoice/Validation/*.sch`).

### Validation order (UBL)

When validating Peppol BIS UBL XML, apply **CEN EN16931** first, then **Peppol BIS** (same order as `PeppolValidationAssets::ublXsltRelativePaths()`).

---

## Known limitations

- FatturaPA: does not support multiple bodies yet.
