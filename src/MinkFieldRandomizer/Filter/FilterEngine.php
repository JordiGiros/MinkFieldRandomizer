<?php

namespace MinkFieldRandomizer\Filter;

use MinkFieldRandomizer\Registry\Registry;

class FilterEngine
{

    public function filter($value)
    {
        $matches = [];
        if (preg_match_all('/(?P<prefix>[^{}]*)(?:{(?P<function>[^{}]+)})?/', $value, $matches)) {
            $value = '';
            for ($matchIndex = 0; $matchIndex < count($matches[0]); $matchIndex++) {
                if (!empty($matches['function'][$matchIndex])) {
                    $functionString = $matches['function'][$matchIndex];
                    $functionName = $this->getFunction($functionString);
                    $function = 'MinkFieldRandomizer\\Model\\'.$functionName;
                    if (!class_exists($function)) {
                        $registry = Registry::getInstance();
                        if (isset($registry[$functionName])) {
                            return $registry[$functionName];
                        };
                        throw new \Exception(sprintf('Function class "%s" unknown and not a value with such name found in the registry', $function));
                    }
                    $filter = new $function();
                    /* @var $filter FilterInterface */
                    $value .= $matches['prefix'][$matchIndex].$filter->filter($this->getParams($functionString));

                    continue;
                }

                $value .= $matches['prefix'][$matchIndex];
            }
        }

        return $value;
    }

    private function getFunction($value)
    {
        $matches = [];
        $found = preg_match('/([^\(]*)/', $value, $matches);
        if (!$found) {
            return $value;
        }

        return $matches[1];
    }

    private function getParams($value)
    {
        $matches = [];
        $found = preg_match('/[^\(]*\((?<params>[^\)]*)\)/', $value, $matches);
        if (!$found) {
            return [];
        }

        return explode(",", $matches['params']);
    }
}
