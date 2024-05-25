<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Symfony\Component\Validator\Constraints\Type;

class FatturaElettronica
{
	/** @var FatturaElettronicaHeader */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $FatturaElettronicaHeader;

	/** @var FatturaElettronicaBody[] */
	#[All([
		new NotNull(),
		new NotBlank(),
		new Type(FatturaElettronicaBody::class)
	])]
	#[Valid]
	public $FatturaElettronicaBody = [];

// 	/**
// 	 * Get the value of FatturaElettronicaBody
// 	 */ 
// 	public function getFatturaElettronicaBody()
// 	{echo "GET".PHP_EOL;
// 		// echo print_r($this->FatturaElettronicaBody);
// 		return $this->FatturaElettronicaBody;
// 	}

// 	/**
// 	 * Set the value of FatturaElettronicaBody
// 	 *
// 	 * @return  self
// 	 */ 
// 	public function setFatturaElettronicaBody($FatturaElettronicaBody)
// 	{echo "SET";
		
// // echo print_r($FatturaElettronicaBody);/*  */

// 		$this->FatturaElettronicaBody = $FatturaElettronicaBody;

// 		return $this;
// 	}

// 	public function addFatturaElettronicaBody(FatturaElettronicaBody $FatturaElettronicaBody)
// 	{
// 		echo "ADD";
// 		$this->FatturaElettronicaBody[] = $FatturaElettronicaBody;

// 		return $this;
// 	}

// 	public function hasFatturaElettronicaBody()
// 	{echo "HAS";
// 		return count($this->FatturaElettronicaBody) > 0;
// 	}
}
