<?php


namespace Invoiceninja\Einvoice\Writer\Types;

use DOMElement;
use DOMNodeList;

class CccType
{
    //this class also has attributes which have not been defined as yet.
    public string $path = "src/Standards/UBL2.1/common/CCTS_CCT_SchemaModule-2.1.xsd" ;

    private string $prefix = 'xsd';

    public array $type_map = [];

    public array $elements = [];
    
    private array $stub_validation =
        [
           "name" => null,
           "base_type" => null,
           "resource" => [],
           "max_length" => null,
           "min_length" => null,
           "pattern" => null,
   ];

    private \DOMDocument $document;

    public function __construct(private string $name = '')
    {
        $this->document = new \DOMDocument();
        $this->document->load($this->path);
    }
    
    /**
     * getPrimativeType
     *
     * @param  string $name
     * @return string
     */
    public function getPrimativeType(string $name): string
    {
        $result = $this->getXPath("./{$this->prefix}:complexType [@name='{$name}']//{$this->prefix}:annotation//{$this->prefix}:documentation//ccts:PrimitiveType");

        if($result->count() > 0) {
            return str_replace("{$this->prefix}:", "", $result->item(0)->nodeValue);
        }

        throw new \Exception("CCT => Could not find type {$name}");
    }
    
    /**
     * getXPath
     *
     * @param  string $path
     * @param  mixed $element
     * @return DOMNodeList
     */
    private function getXPath(string $path, \DomElement $element = null): ?\DOMNodeList
    {
        $xpath = new \DOMXPath($this->document);
        return $xpath->query($path, $element);
    }
        
    /**
     * getNamedType
     *
     * @param  string $name
     * @return array
     */
    public function getNamedType(string $name): array
    {
        return ['base_type' => $this->getPrimativeType($name)];
    }

}
