<?php

namespace MinkFieldRandomizer\Model;

use Exception;
use MinkFieldRandomizer\Filter\FilterInterface;

class RandomNumber implements FilterInterface
{
    /**
     * @param $params
     *
     * @return mixed
     * @throws \Exception
     * @internal param $value
     */
    public function filter($params)
    {
        if (count($params) > 2) {
            throw new Exception(
                "RandomNumber accepts at most two parameters, returns a random number between the two
                given or between 0 and 9 if no params given."
            );
        }
        if (count($params) != 0 && count($params) != 2) {
            throw new Exception("Only 0 or 2 parameters accepted.");
        }
        if (empty($params)) {
            $params = [0, 9];
        }

        $randomNumber = '';
        $randomNumber .= rand($params[0], $params[1]);

        return $randomNumber;
    }
}
