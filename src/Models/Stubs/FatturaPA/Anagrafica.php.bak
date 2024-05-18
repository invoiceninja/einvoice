<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\AnagraficaType;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\RequiredWith;
use Spatie\LaravelData\Attributes\Validation\RequiredWithoutAll;

class Anagrafica extends Data
{

    #[Max(80)]
    #[Min(1)]
    #[RequiredWithoutAll(['Nome','Cognome'])]
    public string|Optional $Denominazione = '';

    #[Max(60)]
    #[Min(1)]
    #[RequiredWith('Cognome')]
    public string|Optional $Nome = '';

    #[Max(60)]
    #[Min(1)]
    #[RequiredWith('Nome')]
    public string|Optional $CogNome = '';
}
