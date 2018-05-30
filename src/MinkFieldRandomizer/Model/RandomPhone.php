<?php

namespace MinkFieldRandomizer\Model;

use MinkFieldRandomizer\Filter\FilterInterface;

class RandomPhone implements FilterInterface
{
    public function filter($params)
    {
        if (count($params) > 1) {
            throw new \Exception("RandomPhone accepts at most a parameter, the number of numbers in the string");
        }
        if (empty($params)) {
            $params = [15];
        }
        $length = $params[0];

        $chr = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chr[rand(0, strlen($chr) - 1)];
        }

        return $randomString;
    }
}
