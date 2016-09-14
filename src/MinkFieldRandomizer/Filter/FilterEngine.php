<?php

namespace MinkFieldRandomizer\Filter;

use Exception;

class FilterEngine
{
    /**
     * @param $value
     *
     * @return array
     */
    private function getParams($value)
    {
        $matches = [];
        $found = preg_match('/[^\(]*\((?<params>[^\)]*)\)/', $value, $matches);
        if (!$found) {
            return [];
        }

        return explode(",", $matches['params']);
    }

    /**
     * @param $value
     *
     * @return string
     */
    private function getFunction($value)
    {
        $matches = [];
        $found = preg_match('/([^\(]*)/', $value, $matches);
        if (!$found) {
            return $value;
        }

        return $matches[1];
    }

    /**
     * @param $value
     *
     * @return string
     * @throws \Exception
     */
    public function filter($value)
    {
        $matches = [];
        if (preg_match_all('/(?P<prefix>[^{}]*)(?:{(?P<function>[^{}]+)})?/', $value, $matches)) {
            $value = '';
            for ($matchIndex = 0; $matchIndex < count($matches[0]); $matchIndex++) {
                if (!empty($matches['function'][$matchIndex])) {
                    $functionString = $matches['function'][$matchIndex];
                    $functionName = $this->getFunction($functionString);
                    $function = 'MinkFieldRandomizer\\Model\\' . $functionName;
                    if (!class_exists($function)) {
                        $registry = Registry::getInstance();
                        if (isset($registry[$functionName])) {
                            return $registry[$functionName];
                        };
                        throw new Exception(
                            "Function class $function unknown and not a value with such name found in the registry"
                        );
                    }
                    $filter = new $function();
                    /* @var $filter FilterInterface */
                    $value.= $matches['prefix'][$matchIndex] . $filter->filter($this->getParams($functionString));

                    continue;
                }

                $value.= $matches['prefix'][$matchIndex];
            }
        }

        return $value;
    }
}
