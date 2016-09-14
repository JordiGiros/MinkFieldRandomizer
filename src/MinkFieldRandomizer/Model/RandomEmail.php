<?php

namespace MinkFieldRandomizer\Model;

use Exception;
use MinkFieldRandomizer\Filter\FilterInterface;

class RandomEmail implements FilterInterface
{
    /**
     * @param $value
     * @param $params
     *
     * @return mixed
     */
    public function filter($params)
    {
        if (count($params) > 0) {
            throw new Exception("RandomEmail does not accept parameters");
        }
        $length = 10;

        $chr = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chr[rand(0, strlen($chr) - 1)];
        }
        return "Mail{$randomString}@gmail.com";
    }
}
