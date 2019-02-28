<?php

namespace MinkFieldRandomizer\Transformation;

use Behat\Behat\Definition\Call\DefinitionCall;
use Behat\Behat\Transformation\Transformer\ArgumentTransformer;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use MinkFieldRandomizer\Context\FieldRandomizerTrait;

class Argument implements ArgumentTransformer
{

    use FieldRandomizerTrait;

    const SLOT_NAME_OPEN = '{';
    const SLOT_NAME_CLOSE = '}';
    const SLOT_NAME_REGEX = '#{([a-z0-9\(\)\.-]\w*)}#i';

    protected $context;
    protected $matches;

    /**
     *
     */
    public function supportsDefinitionAndArgument(DefinitionCall $definitionCall, $argumentIndex, $argumentValue)
    {
        return
            (($argumentValue instanceof PyStringNode || is_scalar($argumentValue) || $argumentValue instanceof TableNode) &&
                preg_match_all(self::SLOT_NAME_REGEX, serialize($argumentValue), $this->matches, PREG_SET_ORDER));
    }

    /**
     *
     */
    public function transformArgument(DefinitionCall $definitionCall, $argumentIndex, $argumentValue)
    {
        // If this is a NodeTable we need to process every row / column separately.
        if ($argumentValue instanceof TableNode) {
            return $this->transformNodeTableArgument($definitionCall, $argumentIndex, $argumentValue);
        }
        $newArgumentValue = $this->frtFilterValue((string)$argumentValue);

        if ($argumentValue instanceof PyStringNode) {
            $newArgumentValue = explode("\n", $newArgumentValue);
            $newArgumentValue = new PyStringNode($newArgumentValue, count($newArgumentValue));
        }

        return $newArgumentValue;
    }

    /**
     * Transforms a whole argument table.
     *
     * @param TableNode $argumentValue
     */
    public function transformNodeTableArgument(DefinitionCall $definitionCall, $argumentIndex, TableNode $argumentValue)
    {
        $newTableData = $argumentValue->getTable();
        foreach ($newTableData as $i => $row) {
            foreach ($row as $c => $v) {
                // Re-use the scalar replacement function.
                $newTableData[$i][$c] = $this->transformArgument($definitionCall, $i, $v);
            }
        }

        return new TableNode($newTableData);
    }
}
