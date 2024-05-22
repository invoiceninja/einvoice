<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class Allegati
{
	#[NotNull]
	#[NotBlank]
	#[Length(max: 60)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $NomeAttachment;

	#[Length(max: 10)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $AlgoritmoCompressione;

	#[Length(max: 10)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $FormatoAttachment;

	#[Length(max: 100)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $DescrizioneAttachment;

	#[NotNull]
	#[NotBlank]
	public mixed $Attachment;
}
