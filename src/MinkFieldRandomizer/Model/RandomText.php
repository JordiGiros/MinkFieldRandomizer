<?php

namespace MinkFieldRandomizer\Model;

use Exception;
use MinkFieldRandomizer\Filter\FilterInterface;

class RandomText implements FilterInterface
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
        if (count($params) > 1) {
            throw new Exception("RandomText accepts at most a parameter, the number of characters in the string");
        }
        if (empty($params)) {
            $params = [15];
        }
        $length = $params[0];

        $chr = '0123 456 789 abcdef ghij klmn opq rstu vwxyz ABCD EFG HIJKL MNOP QRST UVW XYZ ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chr[rand(0, strlen($chr) - 1)];
        }
        return $randomString;
    }
}
